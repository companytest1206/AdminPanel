<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperCalculationSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_cal_salary', function (Blueprint $table) {
            $table->increments('sup_sal_id');
            $table->string('emp_id');
            $table->string('cid');
            $table->string('work_days_before_change');
            $table->string('mins_month_before_change');
            $table->string('old_basic_salary');
            $table->string('before_change_leave_DHM');
            $table->string('before_change_pay_sal');
            $table->string('work_days_after_change');
            $table->string('mins_month_after_change');
            $table->string('new_basic_salary');
            $table->string('profession_tax');
            $table->string('after_change_leave_DHM');
            $table->string('adv_paid');
            $table->string('sal_encash');
            $table->string('tds_deduct');
            $table->string('after_change_pay_sal');
            $table->string('final_pay_sal');
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
        Schema::dropIfExists('super_cal_salary');
    }
}
