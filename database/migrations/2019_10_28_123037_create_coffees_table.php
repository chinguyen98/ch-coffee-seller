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
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('price');
            $table->string('image');
            $table->integer('capacity');
            $table->string('info', 3000);
            $table->string('specific');
            $table->string('ingredient');
            $table->integer('expired');
            $table->bigInteger('id_brand')->unsigned();
            $table->bigInteger('id_type')->unsigned();
            $table->bigInteger('id_unit')->unsigned();
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('id_type')->references('id')->on('coffee_types')->onDelete('cascade');
            $table->foreign('id_unit')->references('id')->on('units')->onDelete('cascade');
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
