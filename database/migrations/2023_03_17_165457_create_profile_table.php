<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('avatar')->nullable();  
            $table->string('cover_photo')->nullable();          
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->boolean('married', ['Married', 'Single'])->nullable();
            $table->string('gotram')->nullable();
            $table->text('bio')->nullable();
            $table->text('best_known_for')->nullable();
            $table->text('achievements_recognitions')->nullable();
            $table->string('native_place_id')->nullable();
            $table->string('work_place_id')->nullable();
            $table->string('education_id')->nullable();
            $table->string('profession_id')->nullable();            
            $table->text('about_work')->nullable();
            $table->string('work_experience')->nullable();
            $table->text('interests')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('linkedin_handle')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->timestamps();
        });

        // Schema::create('genders', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        // });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
        // Schema::dropIfExists('genders');
    }
}