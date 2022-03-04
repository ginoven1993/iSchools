<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolScolaritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_scolarites', function (Blueprint $table) {
            $table->increments('idScolarite')->unsigned();
            $table->integer('scolarite_school')->unsigned();
            $table->integer('scolarite_filiere')->unsigned();
            $table->integer('prix_scolarite');
            $table->integer('scolarite_student')->unsigned();
            $table->enum('statut_scolarite', ['PAYE','NON PAYE']);
            $table->integer('created_by')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('scolarite_school')->references('idSchoolBoard')->on('school_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('scolarite_student')->references('idStudent')->on('student_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('scolarite_filiere')->references('idFiliere')->on('school_filieres')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('school_scolarites');
    }
}
