<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        - id
        - page_id (FK: pages)
        - service_id (FK: services)
        */
        Schema::create('page_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_id');
            $table->bigInteger('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_services');
    }
}
