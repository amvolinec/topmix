<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('lesson.index', ['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('lesson.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        if ($request->hasFile('file')) {
//            $path = Storage::disk('uploads')->putFile('videos', $request->file('file'));
//        }

        $lesson = Lesson::create($request->except('_method', '_token', 'published'));
        $lesson->published = $request->has('published') ? 1 : 0;

        if (!empty($path)) {
            $lesson->file = $path;
        }

        $lesson->save();

        return redirect()->route('lesson.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return redirect()->route('lesson.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return View
     */
    public function edit(Lesson $lesson)
    {
        return view('lesson.create', ['courses' => Course::all(), 'lesson' => $lesson, 'users' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {

//        if ($request->hasFile('file')) {
//            $path = Storage::disk('uploads')->putFile('videos', $request->file('file'));
//        }

        $lesson->fill($request->except('_method', '_token', 'published'))->save();

//        if (!empty($path)) {
//            $lesson->file = $path;
//        }

        $lesson->published = $request->has('published') ? 1 : 0;

        $lesson->save();
        return redirect()->route('lesson.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lesson.index');

    }
}
