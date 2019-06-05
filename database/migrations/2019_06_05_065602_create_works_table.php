<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employer');
            $table->string('job');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description');
            $table->unsignedBigInteger('recruit_id')->nullable();
            $table->smallInteger('type');
            $table->timestamps();

            $table->foreign('recruit_id')->references('id')->on('recruits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
