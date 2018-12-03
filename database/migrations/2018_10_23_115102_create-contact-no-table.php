<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactNoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_no', function (Blueprint $table) {
            $table->increments('cont_id');
            $table->integer('emp_id');
            $table->integer('contact_no1');
            $table->integer('contact_no2');
            $table->integer('contact_father');
            $table->integer('contact_mother');
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
        Schema::dropIfExists('contact_no');
    }
}
