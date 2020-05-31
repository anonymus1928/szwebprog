<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckTeacher;
use App\Solution;
use App\Subject;
use App\Task;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkteacher')->except(['getSubject', 'getTask']);
    }

    public function index() {
        return view('subject.subject-list', ['subjects' => User::find(Auth::user()->id)->teacher_subjects]);
    }

    public function indexSubjectAdd() {
        return view('subject.modify-subject');
    }

    public function storeSubject(Request $request) {
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

    public function indexSubjectEdit($code) {
        $subject = Subject::where('code', $code)->firstOrFail();
        return view('subject.modify-subject')->with('subject', $subject);
    }

    public function updateSubject(Request $request, $code) {
        $subject = Subject::where('code', $code)->firstOrFail();
        $validated = $request->validate([
            'name' => 'required|min:3',
            'code' => 'required|size:9|regex:/^IK-[A-Z]{3}[0-9]{3}/|unique:subjects,id,' . $subject->id,
            'credit' => 'required|numeric',
            'description' => 'nullable',
        ]);
        $subject->update($validated);
        return redirect()->route('subject', ['code' => $subject->code]);
    }

    public function deleteSubject(Request $request) {
        $subject = Subject::where('code',$request->input('code'))->firstOrFail();
        $subject->delete();
        return redirect()->route('teacher');
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

    public function indexTaskAdd($code) {
        return view('task.modify-task')->with('code', $code);
    }

    public function storeTask(Request $request, $code) {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'points' => 'numeric|min:0',
            'from' => 'date',
            'until' => 'date|after:from',
        ]);

        $task = new Task;
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->points = $request->input('points');
        $task->from = $request->input('from');
        $task->until = $request->input('until');

        $subject = Subject::where('code', $code)->firstOrFail();
        $subject->tasks()->save($task);

        return redirect()->route('subject', ['code' => $code]);
    }

    public function indexTaskEdit($code, $id) {
        $task = Task::find($id);
        return view('task.modify-task')->with('task', $task);
    }

    public function updateTask(Request $request, $code, $id) {
        $task = Subject::where('code', $code)->firstOrFail()->tasks->find($id);
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'points' => 'numeric|min:0',
            'from' => 'date',
            'until' => 'date|after:from',
        ]);

        $task->update($validated);
        return redirect()->route('subject', ['code' => $code]);
    }

    public function getTask($code, $id)
    {
        $task = Task::find($id);
        return view('task.task', ['task' => $task, 'code' => $code, 'id' => $id]);
    }

    public function getSolution($code, $id) {
        $solution = Solution::find($id);
        return view('solution.solution', ['task' => $solution->task, 'solution' => $solution]);
    }

    public function correctSolution(Request $request, $code, $id) {
        $solution = Solution::find($id);
        $task = $solution->task;
        $validated = $request->validate([
            'result' => 'required|numeric|gte:0|lte:' . $task->points,
        ]);
        $solution->comment = $request->comment;
        $solution->result = $request->result;
        $solution->save();
        $retTask = Solution::find($id)->task->id;
        return redirect()->route('task', ['code' => $code, 'id' => $retTask]);
    }

    public function downloadFile($id) {
        $file = Solution::find($id);
        return Storage::download($file->file, $file->filename);
    }
}
