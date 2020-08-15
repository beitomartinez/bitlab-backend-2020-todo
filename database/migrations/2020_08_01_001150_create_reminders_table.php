<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'reminders',
            function (Blueprint $table) {
                $table->id();
                $table->string('message', 100);
                $table->time('repeat_at')->nullable();
                $table->unsignedBigInteger('task_id')->index();
                $table->dateTime('starts_at')->index();
                $table->timestamp('updated_at');

                $table->foreign('task_id')->references('id')->on('tasks');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reminders');
    }
}
