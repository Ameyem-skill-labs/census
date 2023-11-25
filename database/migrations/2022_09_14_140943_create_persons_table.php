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


        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->biginteger('village_id');
            $table->char('ward_no',5);
            $table->char('house_no',52);
            $table->string('intiperu',120);
            $table->string('peru',120);
            $table->string('street_name',120);
            $table->string('dependant_name',120);
            $table->string('dependant_related_as',20);
            $table->char('gender',5);
            $table->date('dob');
            $table->tinyInteger('edu_qualification_id');
            $table->tinyInteger('profession_id');
            $table->char('mobile',16);
            $table->foreignId('created_by_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->boolean('is_submitted');
            $table->boolean('is_approved');
            $table->foreignId('approved_by_id')->nullable()->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('people');

    }
};
