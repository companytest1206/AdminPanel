<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('inv_id');
            $table->integer('cust_id');
			$table->string('prod_name');
            $table->string('prod_qty');
            $table->string('prod_price');
            $table->string('prod_description');
            $table->string('tax')->default('null');
            $table->string('sub_total');
            $table->string('total');
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
        Schema::dropIfExists('invoice');
    }
}
