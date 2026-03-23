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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // kolom untuk menyimpan nama tag
            $table->timestamps();
        });

        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Job::class, 'job_listing_id')->constrained()->onDelete('cascade'); // membuat foreign key yang menghubungkan dengan tabel jobs, jika pekerjaan dihapus maka tag juga akan dihapus
            $table->foreignIdFor(App\Models\Tag::class, 'tag_id')->constrained()->onDelete('cascade'); // membuat foreign key yang menghubungkan dengan tabel tags, jika tag dihapus maka pekerjaan juga akan dihapus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
