<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('type_business');
            $table->string('name_business_th');
            $table->string('name_business_eng');
            $table->string('address_company');
            $table->integer('vat');
            $table->integer('size');
            $table->string('phone_office');
            $table->string('phone');
            $table->string('website');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
