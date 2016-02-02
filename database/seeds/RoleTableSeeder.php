<?php

use Illuminate\Database\Seeder;
use BCG\Models\Role;

class RoleTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('roles')->truncate();
		Role::create([
			'name' => 'user',
		]);
		Role::create([
			'name' => 'admin',
		]);
	}
}
