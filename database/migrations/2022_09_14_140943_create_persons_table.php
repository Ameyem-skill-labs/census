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
            $table->string('father_husb_name',120);
            $table->char('gender',5);
            $table->date('dob');
            $table->tinyInteger('edu_qualification_id');
            $table->tinyInteger('profession_id');
            $table->tinyInteger('pensoner_type_id');
            $table->boolean('own_a_house');
            $table->tinyInteger('vehicle_type_id');
            $table->boolean('own_agri_land');
            $table->float('land_area', 4, 2);  
            $table->char('aadhaar',16);
            $table->char('ration_card',16);
            $table->char('mobile',16);
            $table->foreignId('created_by_id')->nullable()->constrained('users')->onDelete('cascade');
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
