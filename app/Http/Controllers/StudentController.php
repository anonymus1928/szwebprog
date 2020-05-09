<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Subject;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->teacher) {
                return redirect()->route('teacher');
            }
            return $next($request);
        });
    }

    public function index() {
        return view('subject.subject-list', ['subjects' => User::find(Auth::user()->id)->student_subjects->where('public', true)]);
    }

    public function indexAssign() {
        $all = Subject::all()->where('public', true);
        $assigned = Auth::user()->student_subjects;
        $diff = $all->diff($assigned);
        return view('subject.subject-list', ['subjects' => $diff, 'assign' => true]);
    }

    public function drop(Request $request) {
        Auth::user()->student_subjects()->detach($request->input('id'));
        return redirect()->route('student');
    }

    public function assign(Request $request) {
        Auth::user()->student_subjects()->attach($request->input('id'));
        return redirect()->route('student');
    }
}
