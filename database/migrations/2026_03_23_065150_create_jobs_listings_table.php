<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // operasi untuk membuat tabel baru
    {
        Schema::create('jobs_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Employer::class); // membuat foreign key yang menghubungkan dengan tabel employers, jika perusahaan dihapus maka pekerjaan juga akan dihapus
            $table->text('description'); // kolom untuk menyimpan deskripsi pekerjaan
            $table->string('title'); // kolom untuk menyimpan judul pekerjaan
            $table->string('salary'); // kolom untuk menyimpan gaji pekerjaan
            $table->timestamps(); // berisi kolom created_at dan updated_at untuk mencatat waktu pembuatan dan pembaruan data
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // operasi untuk menghapus tabel yang sudah dibuat
    {
        Schema::dropIfExists('jobs_listings');
    }
};
