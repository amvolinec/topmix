<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'author_id', 'published'];

    public function author(){
        return $this->belongsTo('\App\User', 'author_id', 'id');
    }
}
