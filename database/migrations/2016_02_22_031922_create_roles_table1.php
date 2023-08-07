<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable1 extends Migration
{

    public function up()
    {
        if(! Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title',120);                
                $table->timestamps();                
            });
        }

        Schema::create('types', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary();
            $table->string('name');
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
        Schema::dropIfExists('roles');
        Schema::dropIfExists('types'); 
    }
}
