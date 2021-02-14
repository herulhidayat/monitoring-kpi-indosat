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
            $table->string('site_id')->unique();
            $table->string('site_name');
            $table->string('micro_cluster');
            $table->string('coverage');
            $table->string('status');
            $table->string('outlet_surrounding');
            $table->string('ono');
            $table->string('total_outlet');
            $table->string('uro');
            $table->string('sso');
            $table->string('quro');
            $table->string('qsso');
            $table->string('revenue');
            $table->string('gap_revenue');
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
