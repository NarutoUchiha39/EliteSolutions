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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("Host")->nullable(true);
            $table->string('Name')->unique()->index();
            $table->string("Topic")->nullable(true);
            $table->longText("Description")->nullable(true);
            $table->string("Participants")->nullable(true);
            $table->timestamps();
            $table->foreign("Host")->references("email")->on("custom__auths")->onDelete('set null');
            $table->foreign("Topic")->references("Topic")->on("topics")->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
