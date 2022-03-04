<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_boards', function (Blueprint $table) {
            $table->increments('idPersonalBoard');
            $table->integer('personalSchool')->unsigned();
            $table->foreign('personalSchool')->references('idSchoolBoard')->on('school_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('personalRole')->unsigned();
            $table->foreign('personalRole')->references('idPersonalRole')->on('personal_roles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('personalFirstname');
            $table->string('personalLastname');
            $table->string('personalPhoto');
            $table->string('personalPhoneNumber');
            $table->string('personalSchoolLevel');
            $table->string('personalEmail');
            $table->string('personalOccupation');
            $table->string('personalSalary');
            $table->date('personalJoinDate');
            $table->boolean('isAdmin')->default(false);
            $table->integer('personalAuthor')->nullable();
            $table->enum('authorType',['ROOT','PERSONAL']);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_boards');
    }
}
