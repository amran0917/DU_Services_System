<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('session');
            $table->string('running_year');
            $table->string('roll_no');
            $table->date('birth_date');
            $table->string('email');
            $table->string('phone');
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
        Schema::dropIfExists('all_students');
    }
}
