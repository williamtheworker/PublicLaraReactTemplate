<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblProductDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_details', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->text('description');
            $table->string('product_type', 100);
            $table->dateTime('date_created');
            $table->dateTime('date_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_product_details');
    }
}
