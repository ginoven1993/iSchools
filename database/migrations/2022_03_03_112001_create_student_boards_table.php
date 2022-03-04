<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_boards', function (Blueprint $table) {
            $table->increments('idStudent');
            $table->integer('studentSchool')->unsigned();
            $table->string('studentName');
            $table->string('studentCodeName')->unique();
            $table->integer('studentPhonePrefix');
            $table->integer('studentPhoneNumber');
            $table->integer('studentCodePIN')->default('1234');
            $table->boolean('studentStatus')->default(true);
            $table->string('studentLocation');
            $table->integer('created_by')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('studentSchool')->references('idSchoolBoard')->on('school_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('created_by')->references('idPersonalBoard')->on('personal_boards')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_boards');
    }
}
