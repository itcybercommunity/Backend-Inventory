<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutboundDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbound_details', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('faktur_outbound');
            $table->foreignId('faktur_inbound_detail');
            $table->integer('qty');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('faktur_outbound')->references('faktur')->on('outbounds')->onDelete('cascade');
            $table->foreign('faktur_inbound_detail')->references('id')->on('inbound_details')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outbound_details');
    }
}
