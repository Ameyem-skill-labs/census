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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('initial',10);
            $table->timestamps();
        });
        
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('initial',10);
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('census_name',50);
            $table->string('name',50);
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('mandals', function (Blueprint $table) {
            $table->id();
            $table->string('census_name',50);
            $table->string('name',50);
            $table->foreignId('district_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->foreignId('mandal_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['name', 'mandal_id']);
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
        Schema::dropIfExists('villages');
        Schema::dropIfExists('mandals');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
        
    }
};
