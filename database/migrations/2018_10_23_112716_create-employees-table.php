<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->string('name');
            $table->string('emp_type_id');
            $table->string('joining_date');
            $table->string('bond_period');
            $table->string('training_period');
            $table->string('training_end_date');
            $table->string('probation_period');
            $table->string('probation_end_date');
            $table->string('bond_end_date');
            $table->integer('salary');
            $table->string('confirmation_date');
            $table->string('DOB');
            $table->string('image');
            $table->integer('cont_id');
            $table->string('emailId');
            $table->string('marital_status');
            $table->integer('family_members');
            $table->integer('address_id');
            $table->string('remarks');
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
        Schema::dropIfExists('employee');
    }
}
