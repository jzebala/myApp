<?php

use Illuminate\Database\Seeder;

class UserAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrator
        $user = new App\User();
        $user->name = "admin";
        $user->email = "admin@myapp.com";
        $user->password = bcrypt("mypassword12");
        $user->avatar = "default.png";
        $user->save();
        $user->roles()->attach(1);
    }
}
