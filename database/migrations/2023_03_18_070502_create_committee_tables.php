<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitteeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committee_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('committee_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('committee_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            $table->timestamps();
        });

        Schema::create('committee_position_names', function (Blueprint $table) {
            $table->id();
            $table->string('name');
                        $table->timestamps();
        });

        Schema::create('committee_positions', function (Blueprint $table) {
            $table->id();           
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');            
            $table->unsignedBigInteger('sub_category_id');            
            $table->unsignedBigInteger('position_id');
            
            $table->date('date_of_start')->nullable();
            $table->date('date_of_end')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('committee_categories');
            $table->foreign('type_id')->references('id')->on('committee_types');
            $table->foreign('sub_category_id')->references('id')->on('committee_sub_categories');
            $table->foreign('position_id')->references('id')->on('committee_position_names');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('committee_positions');
        Schema::dropIfExists('committee_position_names');
        Schema::dropIfExists('committee_sub_categories');
        Schema::dropIfExists('committee_types');
        Schema::dropIfExists('committee_categories');
    }
};

