<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserManagementController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Show the index view.
     * 
     * @return Renderable
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $headscouts = User::searchWithRole('HEA');
        return view('userManagement', compact("users", "roles", "headscouts"));
    }

    /**
     * Add a new user.
     * 
     * @return Renderable
     */
    public function add()
    {
        $user = new User;
        $roles = Role::all();
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();
        foreach ($roles as $role) {
            if (request($role->name) === "on")
                $user->addRole($role->id);
            else
                $user->removeRole($role->id);
        }
    }

    /**
     * Edit a user.
     * 
     * @param int $userId
     * 
     * @return string
     */
    public function edit($userId)
    {
        $user = User::find($userId);
        $roles = Role::all();
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $reset = request('password') ? true : false;
        if ($reset) $user->password = Hash::make(request('password'));
        $user->save();
        foreach ($roles as $role) {
            if (request($role->name) === "on") {
                $user->addRole($role->id);
                if ($role->id == "SCO")
                    $user->changeLead(request('lead_id'));
            }
            else {
                $user->removeRole($role->id);
            }
        }
    }
}
