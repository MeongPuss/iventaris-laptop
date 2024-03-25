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
        Schema::create('history_laptops', function (Blueprint $table) {
            $table->id();
            $table->string('ba')->nullable();
            $table->string('unit');
            $table->date('kembali')->nullable();
            $table->date('rotasi')->nullable();
            $table->date('penyerahan')->nullable();
            $table->integer('status');
            $table->unsignedBigInteger('laptop_id');
            $table->foreign('laptop_id')->references('id')->on('laptops')->restrictOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->restrictOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_laptops');
    }
};
