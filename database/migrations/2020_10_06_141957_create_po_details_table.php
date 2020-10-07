<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_details', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('code_faktur');
            $table->foreignId('faktur');
            $table->integer('qty');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('code_faktur')->references('code')->on('products')->onDelete('cascade');
            $table->foreign('faktur')->references('faktur')->on('pos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_details');
    }
}
