<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoffeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coffees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('image');
            $table->integer('capacity');
            $table->text('info');
            $table->string('specific');
            $table->string('ingredient');
            $table->integer('expired');
            $table->integer('id_brand')->unsigned();
            $table->integer('id_type')->unsigned();
            $table->integer('id_unit')->unsigned();
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('RESTRICT');
            $table->foreign('id_type')->references('id')->on('coffee_types')->onDelete('RESTRICT');
            $table->foreign('id_unit')->references('id')->on('units')->onDelete('RESTRICT');
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
        Schema::dropIfExists('coffees');
    }
}
