<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationPersonsTable extends Migration
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
        - reservation_id (FK: reservations)
        - person_fullname
        - notes
        */
        Schema::create('reservation_persons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reservation_id');
            $table->string('person_fullname');
            $table->text('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_persons');
    }
}
