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
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('phonecode', 255)->nullable();
            $table->string('flag', 255)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->tinyInteger('default_currency')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
