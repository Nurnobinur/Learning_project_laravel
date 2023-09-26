<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Newuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       User::insert([
           "name"=>"Md:Nurnobi islam",
           "email"=>"nurnobi10050@gmail.com",
           "password"=>Hash::make("12345678")
       ]);
    }
}
