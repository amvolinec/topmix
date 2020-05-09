<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug'];

    public function permissions(){
        return $this->belongsToMany('App\Permission', 'role_permission');
    }
}
