<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        

        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('position_telugu');
            $table->timestamps();
        });

        Schema::create('jurisdictions', function (Blueprint $table) {
            $table->id();
            $table->string('jurisdiction');
            $table->timestamps();
        });

        Schema::create('sanghams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('about');
            $table->text('registration_details');
            $table->foreignId('jurisdiction_id')->constrained('jurisdictions')->onDelete('cascade');
            $table->integer('place_id');
            $table->string('place_type',20);
            $table->foreignId('created_by_id')->constrained('users')->onDelete('cascade');
            $table->boolean('approved')->nullable();          
            $table->foreignId('approved_by_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->date('effective_from');
            $table->timestamps();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('sangham_id')->constrained('sanghams')->onDelete('cascade');
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');
            $table->date('effective_from');
            $table->boolean('approved')->nullable();          
            $table->foreignId('approved_by_id')->nullable()->constrained('users')->onDelete('cascade');
            
            $table->timestamps();

            // Add unique constraint
            $table->unique(['user_id', 'sangham_id']);
        });
    }


    public function down()
    {
        
        
        
        Schema::dropIfExists('members');
        Schema::dropIfExists('sanghams');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('jurisdictions');
    }
};
