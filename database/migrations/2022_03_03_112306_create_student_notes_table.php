<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_notes', function (Blueprint $table) {
            $table->increments('idnote');
            $table->integer('studentNote');
            $table->integer('cours')->unsigned();
            $table->integer('student')->unsigned();
            $table->integer('filiere')->unsigned();
            
            $table->timestamps();

            $table->foreign('cours')->references('idCours')->on('school_cours')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student')->references('idStudent')->on('student_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('filiere')->references('idFiliere')->on('school_filieres')->onDelete('cascade')->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_notes');
    }
}
