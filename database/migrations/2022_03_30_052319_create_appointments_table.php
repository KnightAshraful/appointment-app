<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->integer('appointment_no');
            $table->string('appointment_date')->nullable();
            $table->string('doctor_id')->nullable();
            $table->string('patient_name')->nullable();
            $table->integer('patient_phone')->nullable();
            $table->integer('total_fee')->nullable();
            $table->integer('paid_amount')->nullable();

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
        Schema::dropIfExists('appointments');
    }
}
