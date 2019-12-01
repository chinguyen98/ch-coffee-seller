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
            $table->integer('id_customer')->nullable()->unsigned();
            $table->string('id_guest')->nullable();
            $table->integer('id_admin')->unsigned();
            $table->integer('id_shipping_info')->unsigned();
            $table->integer('id_status')->default(1)->unsigned();
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
