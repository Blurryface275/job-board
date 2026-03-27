<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $table = 'tags'; // nama tabel yang digunakan untuk model ini, secara default Laravel akan menggunakan nama tabel jamak dari nama model, dalam hal ini adalah 'tags'
    protected $fillable = ['name']; // kolom yang bisa diisi secara massal, dalam hal ini hanya kolom name yang bisa diisi secara massal

    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id'); // relasi many to many, satu tag bisa dimiliki oleh banyak pekerjaan, dan satu pekerjaan bisa memiliki banyak tag
    }
}
