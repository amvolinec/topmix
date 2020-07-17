<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::with('role')->where('id', Auth::user()->id)->first();
        if ($user->role->id == 1) {
            return view('home-admin');
        } elseif ($user->role->id == 2) {
            return view('home-lecture');
        }
        return view('home-user');
    }
}
