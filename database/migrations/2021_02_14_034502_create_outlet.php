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
            $table->string('outlet_id')->unique()->nullable();
            $table->string('username')->nullable();
            $table->string('outlet_name')->nullable();
            $table->string('micro_cluster')->nullable();
            $table->string('category')->nullable();
            $table->string('balance')->nullable();
            $table->string('mobo_transaction')->nullable();
            $table->string('sultan_target')->nullable();
            $table->string('sultan_ach')->nullable();
            $table->string('sultan_percen')->nullable();
            $table->string('jawara_target')->nullable();
            $table->string('jawara_ach')->nullable();
            $table->string('jawara_percen')->nullable();
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
