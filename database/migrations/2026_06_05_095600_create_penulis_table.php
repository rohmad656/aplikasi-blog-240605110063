<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penulis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50);
            $table->string('user_name', 50)->unique();
            $table->string('password');
            $table->string('foto')->default('default.png');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penulis');
    }
};
