<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_has_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('roles_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('roles_has_users', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('roles_has_users', function (Blueprint $table) {
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_has_users');
    }
}
