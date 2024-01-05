<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname',120);
            $table->string('name',120);
            $table->string('avatar')->nullable();
            $table->string('username',20)->nullable()->unique();
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile',15);
            $table->enum('sex', ['male', 'female', 'other'])->nullable();
            $table->enum('marriage_status', ['single', 'married', 'widow', 'divorced'])->nullable();
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();
            $table->enum('education', ['nil', 'under_10th', '10th_pass', '12th_pass', 'graduate','masters'])->nullable();
            $table->enum('occupation', ['study', 'unemployed', 'gvt_emp', 'pvt_emp', 'farmer', 'self_emp', 'business', 'other'])->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('editing_village_id')->nullable();
            $table->integer('place_id')->nullable();
            $table->string('place_table_name',15)->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->foreignId('approved_by_id')->nullable()->constrained('users');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
