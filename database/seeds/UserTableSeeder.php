<?php

use Illuminate\Database\Seeder;
use BCG\Models\User;
use BCG\Models\Role;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->truncate();
		$user = User::create([
			'name' => 'Ben Rogers',
			'email' => 'brogers@boydcatongroup.com',
			'password' => bcrypt('testpass')
		]);

		$user->roles()->attach(Role::byName('admin')->first());
	}
}
