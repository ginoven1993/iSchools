<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_roles', function (Blueprint $table) {
            $table->increments('idPersonalRole');
            $table->integer('roleSchool')->unsigned();
            $table->string('roleName');
            $table->string('roleCode')->unique();
            $table->boolean('roleStatus')->default(true);
            $table->integer('created_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('roleSchool')->references('idSchoolBoard')->on('school_boards')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_roles');
    }
}
