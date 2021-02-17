<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site', function (Blueprint $table) {
            $table->id();
            $table->string('site_id')->unique()->nullable();
            $table->string('site_name')->nullable();
            $table->string('micro_cluster')->nullable();
            $table->string('coverage')->nullable();
            $table->string('status')->nullable();
            $table->string('outlet_surrounding')->nullable();
            $table->string('ono')->nullable();
            $table->string('total_outlet')->nullable();
            $table->string('uro')->nullable();
            $table->string('sso')->nullable();
            $table->string('quro')->nullable();
            $table->string('qsso')->nullable();
            $table->string('revenue')->nullable();
            $table->string('gap_revenue')->nullable();
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
        Schema::dropIfExists('site');
    }
}
