<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItineraryUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('itinerary_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_4835070')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('itinerary_id');
            $table->foreign('itinerary_id', 'itinerary_id_fk_4835070')->references('id')->on('itineraries')->onDelete('cascade');
        });
    }
}
