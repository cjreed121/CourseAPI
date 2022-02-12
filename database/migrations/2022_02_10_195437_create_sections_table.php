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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('instruction_method')->nullable();
            $table->string('section_number');
            $table->integer('enrolled');
            $table->integer('max_enrolled');
            $table->integer('remaining');
            $table->string('instructor');
            $table->integer('crn');
            $table->timestamps();

            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
};
