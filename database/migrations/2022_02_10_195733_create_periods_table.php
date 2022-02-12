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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('location')->nullable();
            $table->string('type');
            $table->string('start_time');
            $table->string('end_time');
            $table->json('days');
            $table->timestamps();

            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periods');
    }
};
