<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('created_by_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('all_professions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('created_by_id')->references('id')->on('users');
            $table->foreignId('category_id')->constrained('profession_categories');
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
        Schema::dropIfExists('all_professions');
        Schema::dropIfExists('profession_categories');
    }
}

