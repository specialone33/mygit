<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItinerariesTable extends Migration
{
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('from');
            $table->string('to');
            $table->string('map_point')->nullable();
            $table->decimal('price', 15, 2);
            $table->string('canceled')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
