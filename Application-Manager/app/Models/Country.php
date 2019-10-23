<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Translatable;
    
    public $incrementing = false;
    protected $keyType = "string";
}
