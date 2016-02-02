<?php namespace BCG\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * BCG\Models\Role
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCG\Models\User[] $users
 */
class Role extends Model
{
	use SoftDeletes;

	public function users()
	{
		return $this->belongsToMany('BCG\Models\User');
	}

	public function scopeByName($query, $name)
	{
		return $query->where('name', $name);
	}
}
