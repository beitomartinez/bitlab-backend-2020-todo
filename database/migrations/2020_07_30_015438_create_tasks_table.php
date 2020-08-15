<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'tasks',
            function (Blueprint $table) {
                $table->id();
                $table->string('name', 50)->index();
                $table->text('description')->nullable();
                $table->unsignedBigInteger('category_id')->index();
                $table->tinyInteger('level')->default(0);
                $table->tinyInteger('state')->default(0)->index();
                $table->unsignedBigInteger('created_by')->index();
                $table->timestamp('completed_at');
                $table->dateTime('complete_date')->index();
                $table->timestamps();

                $table->foreign('category_id')->references('id')->on('categories');
                $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('tasks');
    }
}
