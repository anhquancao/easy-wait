<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurrentQueueUserToQueue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('queues', function (Blueprint $table) {
            $table->uuid("current_queue_user_id")->nullable()->index();
        });

        Schema::table('queue_user', function (Blueprint $table){
            $table->uuid("previous_queue_user_id")->nullable()->index();
            $table->uuid("next_queue_user_id")->nullable()->index();
        });
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
}
