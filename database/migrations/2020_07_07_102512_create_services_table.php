<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
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
        - user_id (FK: users)

        - max_person_per_reservation (max number of persons that can be added to a single reservation)
        - total_person_per_day (if this limit is reached, the service will no longer accept reservations for that day)

        - name
        - description
        - cut_off_hours (how many hours prior to the activity/service can someone book)

        - price
        - accept_full_amount (0 = won't ask for payment; 1 = will ask for payment via bank transfer)
        - accept_reservation_fee (whether to accept reservation fee or not. if accept_full_amount is 1 then this will always be 0)
        - reservation_fee

        - days_available (array containing the days this service can be booked)

        - main_image_url
        - secondary_image_urls
        - accept_notes

        - created_at
        - updated_at
        */
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');

            $table->integer('max_person_per_reservation');
            $table->integer('total_person_per_day');
            $table->string('name');
            $table->text('description')->nullable();
            $table->tinyInteger('cut_off_hours')->default(24);

            $table->float('price'); // 0 = free

            $table->boolean('accept_full_amount');
            $table->boolean('accept_reservation_fee');
            $table->float('reservation_fee')->nullable();

            $table->string('main_image_url')->nullable();
            $table->text('secondary_image_urls')->nullable();

            $table->text('days_available')->nullable(); // if null then available 7 days
            $table->boolean('accept_notes');

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
        Schema::dropIfExists('services');
    }
}
