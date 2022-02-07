<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('comment_a_a')->unsigned()->default(0);
            $table->tinyInteger('user_a_a')->unsigned()->default(0);
            $table->tinyInteger('recent_p_l')->unsigned()->default(5);
            $table->tinyInteger('popular_p_l')->unsigned()->default(5);
            $table->tinyInteger('recent_c_l')->unsigned()->default(10);

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
        Schema::dropIfExists('settings');
    }
}
