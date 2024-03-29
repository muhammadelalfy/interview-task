<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullArabicName');
            $table->string('fullEnglishName');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('last_login')->nullable();
//            $table->date('birth_date')->format('Y-m-d')->nullable();
//            $table->string('bio');
//            $table->integer('lat')->nullable();
//            $table->integer('lng')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('country_id')->constrained();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
