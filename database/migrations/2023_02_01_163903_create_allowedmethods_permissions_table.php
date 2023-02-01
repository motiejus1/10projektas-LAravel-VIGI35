<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowedmethodsPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowedmethods_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('allowedmethod_id');
            $table->unsignedBigInteger('permission_id');

            $table->foreign('allowedmethod_id')->references('id')->on('allowedmethods');
            $table->foreign('permission_id')->references('id')->on('permissions');
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
        Schema::dropIfExists('allowedmethods_permissions');
    }
}
