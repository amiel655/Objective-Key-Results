<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOkrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('okr', function (Blueprint $table) {
            $table->increments('okr_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('level');
            $table->string('weeknum');
            $table->string('objective');
            $table->text('description');
            $table->string('date_recieved');
            $table->string('date_due');
            $table->string('man_hours');
            $table->integer('status');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('okr');
    }
}
