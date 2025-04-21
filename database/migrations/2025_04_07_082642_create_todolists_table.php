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
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // nama tugas
            $table->text('deskripsi')->nullable(); // deskripsi tugas (boleh kosong)
            $table->enum('proritas', ['priority', 'non-priority'])->default('non-priority'); // prioritas tugas
            $table->enum('status', [ 'in-progress', 'completed'])->default('in-progress'); // status tugas
            $table->date('deadline')->nullable(); // tenggat waktu (boleh kosong)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolists');
    }
};
