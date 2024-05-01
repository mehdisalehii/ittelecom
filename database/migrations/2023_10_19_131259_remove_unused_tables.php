<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('widget_main_categories');
        Schema::dropIfExists('widget_sub_categories');
        Schema::dropIfExists('widget_why_us');
        Schema::dropIfExists('stats');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('seos');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('newsletters');
        Schema::dropIfExists('letters');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
