<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('agency', 40);
            $table->string('from_station', 80);
            $table->string('to_station', 80);
            $table->dateTime('date_of_departure');
            $table->dateTime('date_of_arrival');
            $table->smallInteger('train_code')->unsigned();
            $table->tinyInteger('train_cars')->unsigned();
            $table->boolean('on_time');
            $table->boolean('canceled');
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
        Schema::dropIfExists('trains');
    }
};
