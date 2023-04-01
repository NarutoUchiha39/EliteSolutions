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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string("Sender");
            $table->string("Room");
            $table->longText("Body");
            $table->timestamps();
            $table->foreign("Room")->references("Name")->on("rooms")->onDelete('cascade');
            $table->foreign("Sender")->references("email")->on("custom__auths")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
