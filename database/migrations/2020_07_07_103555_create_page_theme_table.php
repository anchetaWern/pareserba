<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageThemeTable extends Migration
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
        - logo
        - is_shadows_enabled
        - theme_settings
        - has_greeting (whether there's a greeting modal or not)
        - greeting image
        - greeting_text
        - closed_text (will be displayed instead of greeting text if page is locked)
        - link_to_home
        */
        Schema::create('page_theme', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_id');
            $table->string('logo')->nullable();
            $table->boolean('is_shadows_enabled');
            $table->text('theme_settings');
            $table->boolean('has_greeting');
            $table->string('greeting_image')->nullable();
            $table->text('greeting_text')->nullable();
            $table->string('closed_text')->nullable();
            $table->boolean('link_to_home')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_theme');
    }
}
