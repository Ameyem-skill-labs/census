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


        // Schema::create('people', function (Blueprint $table) {
        //     $table->id();
        //     $table->biginteger('village_id');
        //     $table->char('ward_no',5);
        //     $table->char('house_no',52);
        //     $table->string('intiperu',120);
        //     $table->string('peru',120);
        //     $table->string('street_name',120);
        //     $table->string('dependant_name',120);
        //     $table->string('dependant_related_as',20);
        //     $table->char('gender',5);
        //     $table->date('dob');
        //     $table->tinyInteger('edu_qualification_id');
        //     $table->tinyInteger('profession_id');
        //     $table->char('mobile',16);
        //     $table->foreignId('created_by_id')->nullable()->constrained('users');
        //     $table->boolean('is_submitted');
        //     $table->boolean('is_approved');
        //     $table->foreignId('approved_by_id')->nullable()->constrained('users');
        //     $table->timestamps();
        // });
        

        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->string('ward_number',20)->nullable();
            $table->string('street',120)->nullable();
            $table->string('pincode',6)->nullable();
            $table->string('door_number',20)->nullable();
            $table->string('surname',120)->nullable();
            $table->string('name',120)->nullable();
            $table->string('avatar')->nullable();
            $table->string('relative_name',120)->nullable();
            $table->string('mobile',10)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('sex', ['male', 'female', 'other'])->nullable();
            $table->enum('marriage_status', ['single', 'married', 'widow', 'divorced'])->nullable();
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();
            $table->enum('education', ['nil', 'under_10th', '10th_pass', '12th_pass', 'graduate','masters'])->nullable();
            $table->enum('occupation', ['study', 'unemployed', 'gvt_emp', 'pvt_emp', 'farmer', 'self_emp', 'business', 'other'])->nullable();

            $table->foreignId('created_by_id')->nullable()->constrained('users');
            $table->foreignId('edited_by_id')->nullable()->constrained('users');
            $table->boolean('is_submitted')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->foreignId('approved_by_id')->nullable()->constrained('users');
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('set null');
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
