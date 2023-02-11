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
            'file720' => $this->getVideoPath($this->file, '720'),
            'file480' => $this->getVideoPath($this->file, '480'),
            'file360' => $this->getVideoPath($this->file, '360'),
            'notes' => $this->notes,
            'course_id' => $this->course_id,
            'published' => $this->published,
            'course' => $this->course,
        ];
    }

    public function videos() {
        return [
            'file' => $this->file,
            'file720' => $this->getVideoPath($this->file),
            'file480' => $this->getVideoPath($this->file, '480'),
            'file360' => $this->getVideoPath($this->file, '360'),
        ];
    }

    private function getVideoPath($path, $size = '720') {

        $path_parts = pathinfo($path);
        return  $path_parts['dirname']. '/' . $path_parts['filename'] . '-' . $size . '.' . $path_parts['extension'];
    }
}
