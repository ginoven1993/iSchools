<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_permissions', function (Blueprint $table) {
            $table->increments('idPersonalPermission');
            $table->integer('permissionUser')->unsigned();
            $table->integer('permissionAuthor')->unsigned();
            $table->boolean('canCreate')->default(true);
            $table->boolean('canRead')->default(true);
            $table->boolean('canUpdate')->default(false);
            $table->boolean('canDelete')->default(false);
            $table->integer('created_by')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('permissionUser')->references('idPersonalBoard')->on('personal_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('permissionAuthor')->references('idPersonalBoard')->on('personal_boards')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('personal_permissions');
    }
}
