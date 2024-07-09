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
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->string('domisili')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->string('phone')->nullable();
            $table->string('size')->nullable();
            $table->string('age')->nullable();
            $table->string('phone_urgent')->nullable();
            $table->string('contant_urgent')->nullable();
            $table->string('relation_urgent')->nullable();
            $table->string('community')->nullable();
            $table->string('name_community')->nullable();
            $table->string('tokens_account')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('participant_number')->nullable();
            $table->string('kode_pay')->nullable();
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
        Schema::dropIfExists('sessions');
    }
};
