<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salutation', 100)->nullable();
            $table->string('first_name', 100);
            $table->string('initials', 100)->nullable();
            $table->string('last_name', 100);
            $table->string('suffix', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('profession', 100)->nullable();
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
        Schema::dropIfExists('owners');
    }
}
