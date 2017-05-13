<?php

use Illuminate\Database\Seeder;

use App\User;
use App\LoginLogs;
use App\Roles;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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

        // Moderator
        $user = new App\User();
        $user->name = "moderator";
        $user->email = "moderator@myapp.com";
        $user->password = bcrypt("mypassword12");
        $user->avatar = "default.png";
        $user->save();
        $user->roles()->attach(2);

    }
}
