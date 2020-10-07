<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboundDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbound_details', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('faktur_inbound');
            $table->foreignId('faktur_po_detail');
            $table->integer('qty');
            $table->integer('price_sell');
            $table->timestamps();

            $table->foreign('faktur_inbound')->references('faktur')->on('inbounds')->onDelete('cascade');
            $table->foreign('faktur_po_detail')->references('id')->on('po_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inbound_details');
    }
}
