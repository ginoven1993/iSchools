<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_boards', function (Blueprint $table) {
            $table->increments('idSchoolBoard');
            $table->string('schoolName')->unique();
            $table->string('schoolCodeName')->unique();
            $table->string('schoolLocation');
            $table->string('schoolPhones');
            $table->string('schoolEmail')->nullable();
            $table->string('schoolSlogan')->nullable();
            $table->boolean('schoolLogo')->nullable();
            $table->integer('schoolCreator')->unsigned();
            $table->foreign('schoolCreator')->references('idRoot')->on('roots')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('school_boards');
    }
}
