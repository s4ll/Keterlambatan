<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rayon()
    {
        return $this->belongsTo(rayon::class, 'rayon_id','id');
    }

    public function rombel()
    {
        return $this->belongsTo(rombel::class, 'rombel_id','id');
    }

    public function late()
    {
        return $this->hasMany(late::class, 'student_id','id');
    }

    public function getTotalLates()
    {
        // Hitung jumlah keterlambatan siswa
        return $this->late()->count();
    }
}
