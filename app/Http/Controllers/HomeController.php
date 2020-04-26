<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Subject;
//use App\Task;
//use App\Solution;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [ 'teachers'  => User::All()->where('teacher', true)->Count(),
                              'students'  => User::All()->where('teacher', false)->Count(),
                              'tasks'     => 0,
                              'solutions' => 0,
                            ]);
    }
}
