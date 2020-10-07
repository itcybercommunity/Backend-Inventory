<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('qty');
            $table->string('reason', 50);
            $table->foreignId('id_outbound_detail');
            $table->foreignId('id_roadblock');
            $table->timestamps();

            $table->foreign('id_outbound_detail')->references('id')->on('outbound_details')->onDelete('cascade');
            $table->foreign('id_roadblock')->references('id')->on('roadblocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returs');
    }
}
