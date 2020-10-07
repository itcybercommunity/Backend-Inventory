<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadblocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadblocks', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('faktur_outbound');
            $table->foreignId('id_employment');
            $table->timestamps();

            $table->foreign('faktur_outbound')->references('faktur')->on('outbounds')->onDelete('cascade');
            $table->foreign('id_employment')->references('nip')->on('employments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roadblocks');
    }
}
