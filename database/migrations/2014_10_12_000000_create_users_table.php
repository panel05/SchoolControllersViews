<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //auto-increment, priamry key, biginteger (csak az ID-ra vonatkozik)
            $table->id();
            $table->string('name');
            $table->string('email')->unique();          
            $table->timestamps();
        });

        //rekordok ide kerülnek
        User::create(['name' => 'János', 'email' => 'diak1@gmail.com']);
        User::create(['name' => 'Klári', 'email' => 'diak2@gmail.com']);
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
};
