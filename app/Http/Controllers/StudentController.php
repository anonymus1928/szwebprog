<?php

namespace App\Http\Controllers;

use App\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Subject;
use App\Task;

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

    public function getSolution($code, $id) {
        $task = Task::find($id);
        return view('solution.solution', ['code' => $code, 'task' => $task, 'code' => $code, 'id' => $id]);
    }

    public function storeSolution(Request $request, $code, $id) {
        $validated = $request->validate([
            'text' => 'required',
            'until' => 'date|after:now',
        ]);
        $user = Auth::user();
        $task = Task::find($id);
        $solution = new Solution();
        $solution->text = $request->text;
        if($request->hasFile('upfile')) {
            $path = $request->file('upfile')->store('files');
            $solution->file = $path;
            $solution->filename = $request->upfile->getClientOriginalName();
        }
        $solution->task()->associate($task);
        $solution->student()->associate($user);
        $solution->save();

        return redirect()->route('task', ['code' => $code, 'id' => $id]);
    }

    public function indexTasks() {
        return view('task.task-list');
    }
}
