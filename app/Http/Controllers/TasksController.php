<?php

namespace BCG\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use BCG\Models\Task;
use Gate;

class TasksController extends Controller
{
	use ValidatesRequests, AuthorizesRequests;

	public function getHome(Request $request)
	{
		return view('tasks.home',[
			'tasks' => $request->user() === null ? [] : Task::forUser($request->user())->get(),
		]);
	}

	public function postCreate(Request $request)
	{
		$this->authorize('create', 'BCG\Models\Task');
		$this->validate($request, [
			'task' => 'required',
		]);

		$task = new Task;
		$task->user_id = $request->user()->id;
		$task->task = $request->get('task');
		$task->save();

		return redirect()->route('home');
	}

	public function getUpdate(Task $task)
	{
		$this->authorize('update', $task);
		$task->completed = !$task->completed;
		$task->save();

		return redirect()->route('home');
	}

	public function getDelete(Task $task)
	{
		$this->authorize('delete', $task);
		$task->delete();

		return redirect()->route('home');
	}
}
