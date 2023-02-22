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
        Schema::create('custom__auth_questions', function (Blueprint $table) {
            $table->id();
            $table->string('user_email');
            $table->string('question_name');
            $table->timestamps();
            $table->foreign('question_name')->references('title')->on('questions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_email')->references('email')->on('custom__auths')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom__auth_questions');
    }
};
