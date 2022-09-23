<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table ->string('title', 50);
            $table ->longText('description', 150);
            $table ->date('end_date')->default('2022-09-10');
            //oszlop és külsőkapcsolat beállítása egyben
            $table ->foreignId('user_id')->references('id')->on('users');
            $table ->integer('status')->default(0);
            $table->timestamps();
        });

        //rekordok ide kerülnek
        Task::create(['title' => 'Adatbázis tervezése', 'description' => 'Raktár adatbázis létrehozása','user_id'=> 2 , 'status' => 1]);
        Task::create(['title' => 'Végpontok írása', 'description' => 'Felhasználók listázása','end_date' => '2022-09-12', 'user_id'=> 1]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
