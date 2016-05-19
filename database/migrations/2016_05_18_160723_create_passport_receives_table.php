<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassportReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passport_receives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('passport_no');
            $table->string('broker_name');
            // $table->string('broker_name');
            $table->integer('manager_id')->unsigned();

            $table->foreign('manager_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade'); 
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
        Schema::drop('passport_receives');
    }
}
