<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title','description','text','file','notes','course_id','published'];

    public function users(){
        return $this->belongsToMany('\App\User', 'user_lesson');
    }

    public function course(){
        return $this->belongsTo('\App\Course');
    }

    public function format() {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'text' => $this->text,
            'file' => $this->file,
            'notes' => $this->notes,
            'course_id' => $this->course_id,
            'published' => $this->published,
            'course' => $this->course,
        ];
    }
}
