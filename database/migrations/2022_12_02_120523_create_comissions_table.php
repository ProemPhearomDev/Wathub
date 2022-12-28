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
        Schema::create('comissions', function (Blueprint $table) {
            $table->id();
            $table->string('comission_image');
            $table->string('name');
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_becam_comis')->nullable();
            $table->string('role');
            $table->string('phone')->nullable();
            $table->integer('status')->default(1);
            $table->integer('village_id');
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
        Schema::dropIfExists('comissions');
    }
};
