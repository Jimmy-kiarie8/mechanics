<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'mjobs';


    public function user()
    {
        return $this->hasMany('App\User');
    }
}
