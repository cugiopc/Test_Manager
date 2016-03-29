<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

use App\Repositories\TaskRepository;


class TaskController extends Controller
{
    
	protected $tasks;

    public function __construct(TaskRepository $tasks) {
    	$this->middleware('auth');
    	$this->tasks = $tasks;
    }

    public function index(Request $request){

    	$tasks = Task::where('user_id', $request->user()->id)->get();

    	return view('tasks.index',[
    		'tasks' => $this->tasks->forUser($request->user()), // su dung phuong thuc da dinh nghia trong Repository
    	]);
    	//'tasks' => $this->tasks->forUser($request->user()),
    }

    public function store(Request $request){

    	$this->validate($request, [
    		'name' => 'required|max:255',
    	]);

    	$user = $request->user();

    	$user->tasks()->create([
            'name' => $request->name,
        ]);

    	return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task){

    	$this->authorize('destroy', $task); // xac thuc lai truoc khi xoa : su dung Policy
    	$task->delete();
    	return redirect('/tasks');
    }
}
