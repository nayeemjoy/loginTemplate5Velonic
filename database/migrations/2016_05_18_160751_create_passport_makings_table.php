<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassportMakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passport_makings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('passport_no');
            $table->string('broker_name');
            // $table->string('broker_name');
            $table->integer('manager_id')->unsigned();

            $table->foreign('manager_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade'); 
            $table->string('amount_of_money');

            // Medical Test
            $table->enum('medical_test_status',['fit','unfit'])->nullable();
            $table->string('medical_test_file_upload')->nullable();
            $table->string('medical_test_date')->nullable();

            // Gamcca
            $table->string('gamcca_amount_of_money')->nullable();
            $table->string('gamcca_date')->nullable();

            // Enzaz 

            $table->string('enzaz_amount_of_money')->nullable();
            $table->string('enzaz_okala_name')->nullable();
            $table->string('enzaz_file_upload')->nullable();
            $table->string('enzaz_date')->nullable();

            // Fit Receive

            $table->string('fit_receive_medical_name')->nullable();
            $table->string('fit_receive_file_upload')->nullable();
            $table->string('fit_receive_date')->nullable();


            // Police Paper

            $table->enum('police_paper_status',['complete','incomplete'])->nullable();
            $table->string('police_paper_date')->nullable();

            // Embassy 

            $table->enum('embassy_visa_stamping_status',['complete','incomplete'])->nullable();
            $table->string('embassy_file_upload')->nullable();
            $table->string('embassy_sponsor_name')->nullable();
            $table->string('embassy_date')->nullable();
            // Fingering 

            $table->enum('fingering_status',['complete','incomplete'])->nullable();
            $table->string('fingering_date')->nullable();

            // Manpower 

            $table->enum('manpower_status',['complete','incomplete'])->nullable();
            $table->string('manpower_manpower_id')->nullable();
            $table->string('manpower_national_id')->nullable();
            $table->string('manpower_visa_id')->nullable();
            $table->string('manpower_date')->nullable();

            // Ticket 
            $table->string('ticket_price_in_taka_and_dollar')->nullable();
            $table->string('ticket_flying_time')->nullable();
            $table->string('ticket_ticket_purchase_date')->nullable();

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
        Schema::drop('passport_makings');
    }
}
