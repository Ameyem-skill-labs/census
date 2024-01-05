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
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->string('marriage_status')->nullable();
            $table->text('about')->nullable();
            $table->string('mobile')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->unsignedBigInteger('education_id')->nullable();
            $table->unsignedBigInteger('profession_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('native_place_id')->nullable();
            $table->unsignedBigInteger('present_place_id')->nullable();
        
            // Foreign keys
            $table->foreign('education_id')->references('id')->on('qualifications')->onDelete('set null');
            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('set null');

            $table->foreign('native_place_id')->references('id')->on('villages')->onDelete('set null');
            $table->foreign('present_place_id')->references('id')->on('villages')->onDelete('set null');
        
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