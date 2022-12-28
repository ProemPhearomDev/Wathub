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
        Schema::create('monks', function (Blueprint $table) {
            $table->id();
            $table->string('monk_image');
            $table->string('name');
            $table->string('dob');
            $table->string('date_in')->nullable();
            $table->string('date_out')->nullable();
            $table->string('old')->nullable();
            $table->string('address')->nullable();
            $table->string('role');
            $table->integer('status')->default(1);
            $table->string('phone')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('monks');
    }
};
