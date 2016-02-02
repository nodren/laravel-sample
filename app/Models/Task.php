<?php namespace BCG\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * BCG\Models\Task
 *
 * @property-read \BCG\Models\User $user
 * @property integer $id
 * @property integer $user_id
 * @property string $task
 * @property boolean $completed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 */
class Task extends Model {
	public function user()
	{
		return $this->belongsTo('BCG\Models\User');
	}

	public function scopeForUser($query, User $user)
	{
		return $query->where('user_id', $user->id);
	}
}