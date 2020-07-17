<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title','description','text','file','notes','course_id','published'];

    public function users(){
        return $this->belongsToMany('\App\User');
    }

    public function course(){
        return $this->belongsTo('\App\Course');
    }
}
