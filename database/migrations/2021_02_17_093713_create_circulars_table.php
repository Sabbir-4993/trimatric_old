<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circulars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('vacancy');
            $table->string('workplace');
            $table->string('date');
            $table->string('salary');
            $table->string('type');
            $table->string('status')->default('Active');
            $table->longText('details');
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
        Schema::dropIfExists('circulars');
    }
}
