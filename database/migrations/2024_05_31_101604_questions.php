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
        schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique()->index();
            $table->longtext('description');
            $table->string('category');
            $table->string('difficulty');
            $table->string('languages')->nullable(true);
            $table->timestamps();
            $table->integer('likes')->default('0');
            $table->integer('dislikes')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
