<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToItinerariesTable extends Migration
{
    public function up()
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4835063')->references('id')->on('users');
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->foreign('vehicle_id', 'vehicle_fk_4835092')->references('id')->on('vehicles');
        });
    }
}
