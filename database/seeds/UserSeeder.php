<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::create([
    		'name' => config('admin.name'),
    		'email' => config('admin.email'),
    		'email_verified_at' => date("Y-m-d H:i:s"),
    		'password' => bcrypt(config('admin.password'))
    	]);
    }
}
