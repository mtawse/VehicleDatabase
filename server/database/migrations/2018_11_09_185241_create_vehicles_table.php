<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('manufacturer_id');
            $table->unsignedInteger('model_id');
            $table->unsignedInteger('owner_id');
            $table->enum('type', ['diesel', 'electric', 'hybrid', 'petrol']);
            $table->enum('usage', ['business', 'personal']);
            $table->string('license_plate', 10);
            $table->unsignedInteger('weight_category');
            $table->unsignedInteger('no_seats');
            $table->boolean('has_boot');
            $table->boolean('has_trailer')->default(false);
            $table->enum('transmission', ['automatic', 'semi-automatic', 'manual']);
            $table->string('colour', 100);
            $table->boolean('is_hgv')->default(false);
            $table->unsignedInteger('no_doors');
            $table->boolean('sunroof')->default(false);
            $table->boolean('has_gps')->default(false);
            $table->unsignedInteger('no_wheels');
            $table->unsignedInteger('engine_cc');
            $table->enum('fuel_type', ['diesel', 'duel', 'electric', 'petrol']);
            $table->timestamps();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('owner_id')->references('id')->on('owners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
