<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testcases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('descriptions');
            $table->text('preconditions');
            $table->text('steps');
            $table->text('actualy_result');
            $table->text('expected_result');
            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status')->onDelete('cascade');
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
        Schema::drop('testcases');
    }
}
