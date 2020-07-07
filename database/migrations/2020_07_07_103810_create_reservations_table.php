<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
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
        - service_id (FK: services)
        - service_datetime (date and time in which the service will be rendered)
        - main_person
        - email
        - notes (custom notes coming from the person who made the reservation)
        - status (0 = created; 1 = reservation_paid; 2 = paid_in_full; 3 = service_rendered)
        - created_at
        - updated_at
        */
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id');
            $table->dateTime('service_datetime');
            $table->string('main_person');
            $table->string('email');
            $table->string('phone_number');
            $table->string('notes')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('reservations');
    }
}
