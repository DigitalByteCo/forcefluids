<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = config('role');
    	foreach ($roles as $r) {
    		$role = new Role;
    		$role->name = $r;
    		$role->save();
    	}
    }
}
