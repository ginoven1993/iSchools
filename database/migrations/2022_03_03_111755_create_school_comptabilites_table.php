<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolComptabilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_comptabilites', function (Blueprint $table) {
            $table->increments('idComptabilite');
            $table->integer('depenseSchool')->unsigned();
            $table->integer('depense_par')->unsigned();
            $table->string('description_depense');
            $table->string('date_depense');
            $table->integer('frais_depense');
            $table->enum('statut_depense',['EN ATTENTE','ACCEPTED','REJECTED'])->default('EN ATTENTE');
            $table->integer('created_by')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('depenseSchool')->references('idSchoolBoard')->on('school_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('depense_par')->references('idPersonalBoard')->on('personal_boards')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('school_comptabilites');
    }
}
