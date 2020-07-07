<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSettingsTable extends Migration
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
        - user_id (FK: user_id)
        - bank_name (for payments)
        - bank_account_number
        - bank_account_name
        */
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('bank_account_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_settings');
    }
}
