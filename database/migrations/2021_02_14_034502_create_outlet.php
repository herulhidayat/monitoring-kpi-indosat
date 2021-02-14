<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutlet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlet', function (Blueprint $table) {
            $table->id();
            $table->string('outlet_id')->unique();
            $table->string('outlet_name');
            $table->string('micro_cluster');
            $table->string('site_area');
            $table->string('category');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('balance');
            $table->string('mobo_transaction');
            $table->string('sultan_target');
            $table->string('sultan_ach');
            $table->string('sultan_percen');
            $table->string('jawara_target');
            $table->string('jawara_ach');
            $table->string('jawara_percen');
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
        Schema::dropIfExists('outlet');
    }
}
