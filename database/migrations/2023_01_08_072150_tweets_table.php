<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('type_id')->default(1);
            $table->string('message');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
                           
            $table->foreign('type_id')
                  ->references('id')
                  ->on('types');
                }); 
    }

    public function down()
    {
        Schema::dropIfExists('tweets');
    }
};
