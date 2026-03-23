<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;
    protected $table = 'employers'; // nama tabel yang digunakan untuk model ini
    protected $fillable = ['name', 'description']; // kolom yang dapat diisi secara massal, selain kolom ini tidak dapat diisi secara massal

    public function jobs(){
        return $this->hasMany(Job::class); // relasi one to many, satu perusahaan bisa memiliki banyak pekerjaan, tetapi satu pekerjaan hanya dimiliki oleh satu perusahaan
    }
}
