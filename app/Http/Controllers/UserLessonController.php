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
        $this->getUserId();
        $users = $this->getUsers();

        if ($this->user_role == 1) {

            return view('lesson.lessons', ['users' => $users]);

        } elseif ($this->user_role == 2) {

            return view('lesson.lecture', ['users' => $users]);

        } elseif ($this->user_role == 3) {
            $user_id = $this->user_id;

            $lessons = Lesson::with('users')->whereHas('users', function ($query) use ($user_id) {
                return $query->where('user_id', $user_id);
            })->get();

            return view('lesson.user', ['lessons' => $lessons]);

        } else {

            return redirect()->route('home');

        }
    }

    public function edit($id)
    {
        $this->getUserId();
        $user = User::with('lessons')->findOrFail($id);

        if ($this->user_role == 1) {
            $lessons = Lesson::with('course')->get();
        } elseif ($this->user_role == 2) {
//            $lessons = Lesson::with('course')->where('author_id', $this->user_id)->get();

            $user_id = $this->user_id;
            $lessons = Lesson::with('course')->whereHas('course', function ($query) use ($user_id) {
                return $query->where('author_id', $user_id);
            })->get();

        } else {
            return redirect()->route('home');
        }

        return view('lesson.add', ['user' => $user, 'lessons' => $lessons]);
    }

    public function add($user_id, Request $request)
    {
        $user = User::with('lessons')->findOrFail($user_id);
        if (!empty($request->get('lessons'))) {
            $lessons = array_keys($request->get('lessons'));
            $values = array_values($lessons);
        } else {
            $values = [];
        }

        $user->lessons()->sync($values);

        return redirect()->route('users.lessons');

    }

    public function view($lesson_id)
    {
        $this->getUserId();

        $lesson =  Lesson::findOrFail($lesson_id);

        if ($this->userCanView($lesson_id)) {
            return view('lesson.view', ['lesson' => $lesson->format()]);
        }
        return redirect()->route('home');
    }


    protected function getUserId()
    {
        if (Auth::check()) {
            $this->user_id = auth()->user()->id;
            $user = User::with('role')->where('id', $this->user_id)->firstOrFail();
            $this->user_role = $user->role->id;
        }
    }

    protected function userCanView($lesson_id)
    {
        $can = false;
        $lesson = Lesson::with('users')->where('id', $lesson_id)->first();
        if ($this->user_role == 1) {
            $can = true;
        }
        if ($this->user_role == 2 && $lesson->author_id == $this->user_id) {
            $can = true;
        }
        if ($this->user_role == 3 && $lesson->users->contains('id', $this->user_id)) {
            $can = true;
        }
        return $can;
    }

    protected function getUsers()
    {
        $users = User::with(['lessons', 'role'])->whereHas('role', function ($query) {
            return $query->where('id', 3);
        })->get();
        return $users;
    }
}
