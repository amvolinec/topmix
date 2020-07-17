<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLessonController extends Controller
{
    protected $user_id = false;
    protected $user_role = 0;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with('lessons')->get();
        return view('lesson.lessons', ['users' => $users]);
    }

    public function edit($id)
    {
        $this->getUserId();

        $users = User::with('lessons')->where('id', $id)->get();
        if($this->user_role == 1) {
            $lessons = Lesson::with('course')->get();
        } elseif($this->user_role == 2) {
            $lessons = Lesson::with('course')->where('author_id', $this->user_id)->get();
        } else {
            return redirect()->route('home');
        }

        return view('lesson.add', ['users' => $users, 'lessons' => $lessons]);
    }

    protected function getUserId(){
        if (Auth::check()){
            $this->user_id = auth()->user()->id;
            $user = User::with('role')->where('id', $this->user_id)->firstOrFail();
            $this->user_role = $user->role->id;
        }
    }
}
