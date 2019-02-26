<?php

use App\Model\User;
use App\Model\Company;
use App\Model\Role;
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
        $company = Company::create(config('admin.company'));

        $user = new User;
        $user->name = config('admin.name');
        $user->email = config('admin.email');
        $user->role_id = Role::ADMIN;
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->password = bcrypt(config('admin.password'));

        $company->customers()->save($user);
    }
}
