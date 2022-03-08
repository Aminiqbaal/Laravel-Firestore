<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'staff']);
        });

        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => 'admin',
                'role' => 'admin'
            ],
            [
                'username' => 'staff',
                'password' => 'staff',
                'role' => 'staff'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
