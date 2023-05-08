<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->id();
            $table->string('name');
            $table->string('user')->unique();
            $table->timestamp('user_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(['name'=>'Secretaria', 'user'=>'secr', 'password'=>bcrypt('13'),'role'=>'secretary']);
        DB::table('users')->insert(['name'=>'Asesor', 'user'=>'asse', 'password'=>bcrypt('13'),'role'=>'assessor']);
        DB::table('users')->insert(['name'=>'Profesor', 'user'=>'prof', 'password'=>bcrypt('13'),'role'=>'professor']);
        DB::table('users')->insert(['name'=>'Estudiante', 'user'=>'stud', 'password'=>bcrypt('13'),'role'=>'student']);
        DB::table('users')->insert(['name'=>'Bachiller', 'user'=>'bach', 'password'=>bcrypt('13'),'role'=>'bachelor']);
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
