<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbounds', function (Blueprint $table) {
            $table->id('faktur');
            // $table->string('faktur', 25)->primary_key();
            $table->foreignId('faktur_po');
            $table->date('date');
            $table->integer('total');
            $table->string('status', 20);
            $table->timestamps();

            $table->foreign('faktur_po')->references('faktur')->on('pos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inbounds');
    }
}
