<?php namespace BCG\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * BCG\Models\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCG\Models\Task[] $tasks
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCG\Models\Role[] $roles
 */
class User extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks()
    {
        return $this->hasMany('BCG\Models\Task');
    }
    public function roles()
    {
        return $this->belongsToMany('BCG\Models\Role');
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->byName('admin')->first() !== null;
    }
}
