<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckTeacher;
use App\Subject;

class TeacherController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkteacher');
    }

    public function index() {
        return view('subject.subject-list', ['subjects' => User::find(Auth::user()->id)->teacher_subjects]);
    }

    public function indexAdd() {
        return view('subject.modify-subject');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'code' => 'required|size:9|regex:/^IK-[A-Z]{3}[0-9]{3}/|unique:subjects',
            'credit' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $subject = new Subject;
        $subject->name = $request->input('name');
        $subject->code = $request->input('code');
        $subject->credit = $request->input('credit');
        $subject->description = $request->input('description');
        
        $user = User::find($request->user()->id);
        $user->teacher_subjects()->save($subject);

        return redirect()->route('teacher');
    }

    public function indexEdit($code) {
        $subject = Subject::where('code', $code)->firstOrFail();
        return view('subject.modify-subject')->with('subject', $subject);
    }

    public function update($code) {
        $subject = Subject::where('code', $code)->firstOrFail();
    }

    public function delete() {
        //
    }

    public function getSubject($code) {
        return view('subject.subject')->with('subject', Subject::where('code', $code)->firstOrFail());
    }

    public function togglePublicity($code) {
        $s = Subject::where('code', $code)->firstOrFail();
        $s->public = !$s->public;
        $s->save();
        return redirect()->route('teacher');
    }
}
