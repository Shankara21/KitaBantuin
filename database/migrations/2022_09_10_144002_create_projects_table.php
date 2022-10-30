<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_categories_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('worker_id')->references('id')->on('users');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('description');
            $table->date('deadline');
            $table->string('budget');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
