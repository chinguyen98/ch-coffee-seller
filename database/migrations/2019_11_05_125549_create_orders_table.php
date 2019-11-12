<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->unsigned();
            $table->integer('id_admin')->unsigned();
            $table->integer('id_shiping_info')->unsigned();
            $table->integer('id_status')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('RESTRICT');
            $table->foreign('id_admin')->references('id')->on('admins')->onDelete('RESTRICT');
            $table->foreign('id_shiping_info')->references('id')->on('shipping_infos')->onDelete('RESTRICT');
            $table->foreign('id_status')->references('id')->on('status')->onDelete('RESTRICT');
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
        Schema::dropIfExists('orders');
    }
}
