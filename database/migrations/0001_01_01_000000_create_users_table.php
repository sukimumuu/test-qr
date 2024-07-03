<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->string('domisili');
            $table->string('distrik');
            $table->string('kecamatan');
            $table->string('phone');
            $table->string('size');
            $table->string('age');
            $table->string('phone_urgent');
            $table->string('contant_urgent');
            $table->string('relation_urgent');
            $table->string('community');
            $table->string('name_community');
            $table->string('tokens_account');
            $table->string('participant_number');
            $table->string('kode_pay');
            $table->enum('status', ['settlement','pending'])->default('pending');
            $table->timestamp('verification_admin', precision: 0)->nullable();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
