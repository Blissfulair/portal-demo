<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename')->nullable();
            $table->string('name');
            $table->integer('class');
            $table->string('sex')->nullable();
            $table->string('dob')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('genotype')->nullable();
            $table->string('blood_group')->nullable();
            $table->integer('user_id');
            $table->integer('deleted')->default(0);
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
        Schema::dropIfExists('students');
    }
}
