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

       Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('created_by_id')->references('id')->on('users');
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

        Schema::dropIfExists('qualifications');
        
        Schema::dropIfExists('professions');
        // Schema::dropIfExists('all_professions');
        // Schema::dropIfExists('profession_categories');

    }
};
