<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ToDoList', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->string('ToDoList');
            $table->foreignId('app_user_id')->references('id')->on('app_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
