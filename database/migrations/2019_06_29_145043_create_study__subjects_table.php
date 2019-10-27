<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudySubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study__subjects', function (Blueprint $table) {
            $table->integer('study_id')->unsigned()->nullable();
            $table->integer('subject_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('study_id')
                ->references('id')
                ->on('studies')
                ->onDelete('set null');

            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study__subjects');
    }
}
