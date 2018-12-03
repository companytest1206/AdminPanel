<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_salary', function (Blueprint $table) {
            $table->increments('sid');
            $table->integer('Basic&DA');
            $table->integer('HRA');
            $table->integer('Conveyance');
            $table->integer('ProvidentFund');
            $table->integer('ESI');
            $table->integer('Loan');
            $table->integer('ProfessionTax');
            $table->integer('TSD/IT');
            $table->integer('NetSalary');
            $table->integer('Salary');
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
        Schema::dropIfExists('emp_salary');
    }
}
