<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MechSkill extends Model
{
    protected $fillable = [
    	'skills', 'mechanic_id', 'user_id'
    ];
}
