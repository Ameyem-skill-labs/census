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

        Schema::create('loksabha_constituencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade');
            $table->timestamps();
        });       
        
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('district_loksabha_constituency', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('loksabha_constituency_id')->constrained('loksabha_constituencies')->onDelete('cascade');
            $table->timestamps();
        });       
        

        Schema::create('assembly_constituencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignId('loksabha_constituency_id')->constrained('loksabha_constituencies')->onDelete('cascade');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('mandals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->foreignId('assembly_constituency_id')->constrained('assembly_constituencies')->onDelete('cascade');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->timestamps();
        });

        
        Schema::create('muncipalities', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('grade',5);
            $table->foreignId('mandal_id')->constrained()->onDelete('cascade');
            $table->foreignId('district_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->foreignId('mandal_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by_id')->references('id')->on('users');
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
        Schema::dropIfExists('muncipalities');
        Schema::dropIfExists('mandals');
        Schema::dropIfExists('assembly_constituencies'); // Added
        Schema::dropIfExists('district_loksabha_constituency'); // Added (Pivot Table)
        Schema::dropIfExists('loksabha_constituencies'); // Added
        Schema::dropIfExists('districts');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
    }

};
