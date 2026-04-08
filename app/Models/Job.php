<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs_listings'; // nama tabel yang digunakan untuk model ini

    protected $fillable = ['title', 'salary', 'description', 'employer_id']; // kolom yang dapat diisi secara massal, selain kolom ini tidak dapat diisi secara massal -> wajib ada

    public function employer()
    {
        return $this->belongsTo(Employer::class); // relasi one to many, satu pekerjaan hanya dimiliki oleh satu perusahaan, tetapi satu perusahaan bisa memiliki banyak pekerjaan
    }

    public function tags()
    {

        return $this->belongsToMany(Tag::class, relatedPivotKey: 'tag_id'); // relasi many to many, satu pekerjaan bisa memiliki banyak tag, dan satu tag bisa dimiliki oleh banyak pekerjaan
    }

    public function scopeFilter(Builder $builder, array $filters)
    {
        // Search by keyword (title or description)
        if ($filters['search'] ?? false) {
            $builder->where(function ($query) use ($filters) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('description', 'like', '%' . $filters['search'] . '%');
            });
        }

        // Filter by tag
        if ($filters['tag'] ?? false) {
            $builder->whereHas('tags', function ($query) use ($filters) {
                $query->where('name', $filters['tag']);
            });
        }
    }
}
