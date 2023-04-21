<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPPLAbsen extends Model
{
    use HasFactory;

    protected $table = 'guru_ppl_absens';

    protected $fillable = ['id_guru_ppl', 'tgl', 'jam_masuk', 'jam_keluar', 'jam_kerja', 'lokasi_absen'];

    public function guru_ppl()
    {
        return $this->belongsTo(GuruPPL::class, 'id_guru_ppl');
    }
}
