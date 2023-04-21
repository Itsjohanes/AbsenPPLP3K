<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruP3KAbsen extends Model
{
    use HasFactory;

    protected $table = 'guru_p3k_absens';

    protected $fillable = ['id_guru_p3k', 'tgl', 'jam_masuk', 'jam_keluar', 'jam_kerja', 'lokasi_absen'];

    public function guru_p3k()
    {
        return $this->belongsTo(GuruP3K::class, 'id_guru_p3k');
    }
}
