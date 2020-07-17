<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::all();

        return view('course.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::with('role')->get();
        return view('course.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Course::create($request->except('_method', '_token'));
        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Course $course)
    {
        return redirect()->route('course.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('course.edit', ['course' => $course, 'users' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->fill($request->except('_method', '_token'))->save();
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index');
    }
}
