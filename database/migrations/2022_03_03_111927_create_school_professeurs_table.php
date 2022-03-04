<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolProfesseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_professeurs', function (Blueprint $table) {
            $table->increments('idProfesseur');
            $table->string('nom_professeur');
            $table->string('code_professeur');
            $table->integer('phone_professeur');
            $table->integer('email_professeur')->nullable();
            $table->integer('salaire_professeur');
            $table->integer('cours_professeur')->unsigned();
            $table->enum('statut',['TITULAIRE','SIMPLE']);
            $table->integer('created_by')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('idPersonalBoard')->on('personal_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cours_professeur')->references('idFiliere')->on('school_filieres')->onDelete('cascade')->onUpdate('cascade');

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_professeurs');
    }
}
