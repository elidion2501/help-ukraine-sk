<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_from_id')->nullable();
            $table->unsignedBigInteger('city_to_id')->nullable();
            $table->string('title');
            $table->integer('type');
            $table->string('name');
            $table->string('phone');
            $table->text('info')->nullable();
            $table->text('count');
            $table->string('car')->nullable();
            $table->boolean('with_animals')->default(false);
            $table->boolean('only_stuff')->default(false);
            $table->boolean('with_people')->default(false);
            $table->boolean('take_from_borders')->default(false);
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
        Schema::dropIfExists('cars');
    }
}
