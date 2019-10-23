<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use App\Models\Role;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that are hidden for arrays.
     * 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that are converted to their native types.
     * 
     * @var array
     */
    protected $casts = [];

    /**
     * Check if a role is already assigned to a user.
     * 
     * @param string $roleName
     * @return bool
     */
    public function hasRole($roleName)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $roleName)
                return true;
        }
        return false;
    }

    /**
     * Get all the user's roles.
     * 
     * @return Collection
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'permissions')->withPivot('lead_id')->withTimestamps();
    }

    /**
     * Assign roles to the user.
     * 
     * @return void
     */
    public function addRole($roleId)
    {
        $role = Role::find($roleId);
        if(! $this->hasRole($role->name))
            $this->roles()->attach($roleId, ["lead_id" => NULL]);
    }

    /**
     * Revoke roles from the user.
     * 
     * @return void
     */
    public function removeRole($roleId)
    {
        $role = Role::find($roleId);
        if($this->hasRole($role->name))
            $this->roles()->detach($roleId);
    }

    /**
     * Get the lead's id of this user's team.
     * 
     * @return int|null
     */
    public function getLeadId()
    {
        foreach ($this->roles as $role) {
            if ($role->id == 'SCO')
                return $role->pivot->lead_id;
        }
        return null;
    }

    /**
     * Change the headscout of a scout.
     * 
     * @param int $leadId
     * @return void
     */
    public function changeLead($leadId)
    {
        $this->roles()->updateExistingPivot("SCO", ["lead_id" => $leadId]);
    }

    /**
     * Get all the user's votes.
     * 
     * @return Collection
     */
    public function votes()
    {
        return $this->belongsToMany('App\Models\Application', 'votes')->withPivot('vote')->withTimestamps();
    }

    /**
     * Register the vote from this user.
     * 
     * @return void
     */
    public function addVote()
    {

    }

    /**
     * When called, this function will timestamps the current
     * time into "last_seen_at
     */
    public function watch()
    {
        $this->last_seen_at = Carbon::now()->toDateTimeString();
        $this->save();
    }

    /**
     * Get a human readable format of when the user
     * last logged in.
     * 
     * @return string
     */
    public function getLastSeen()
    {
        $datetime = $this->last_seen_at;
        if ($datetime)
            return Carbon::parse($datetime)->diffForHumans();
        else
            return "--";
    }

    /* --------------------------------------- */
    /* ---------- Static Functions ----------- */
    /* --------------------------------------- */

    /**
     * Get all users with a particular role.
     * 
     * @param string $roleId
     * @return Collection
     */
    public static function searchWithRole($roleId)
    {
        $entries = DB::table("users")
            ->join('permissions', 'users.id', '=', 'permissions.user_id')
            ->select('users.*')
            ->where("role_id", 'like', $roleId)
            ->get();

        $users = [];
        foreach ($entries as $entry) {
            $user = User::find($entry->id);
            array_push($users, $user);
        }
        return $users;
    }
}