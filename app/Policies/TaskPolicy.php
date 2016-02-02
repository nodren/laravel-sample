<?php

namespace BCG\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use BCG\Models\User;
use BCG\Models\Task;
use Auth;

class TaskPolicy
{
	use HandlesAuthorization;

	public function before(User $user, $ability)
	{
		if ($user->isAdmin)
		{
			//admins can do all the things
			return true;
		}
	}

	//user can read their own
	public function read(User $user, Task $task)
	{
		return $user->tasks->contains($task->id);
	}

	//user can update their own
	public function update(User $user, Task $task)
	{
		return $user->tasks->contains($task->id);
	}

	//user can delete their own
	public function delete(User $user, Task $task)
	{
		return $user->tasks->contains($task->id);
	}

	//user can create for themselves only
	public function create(User $user, Task $task)
	{
		return $user->id == Auth::user()->id;
	}
}
