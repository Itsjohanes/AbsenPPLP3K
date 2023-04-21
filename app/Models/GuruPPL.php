<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPPL extends Model
{
    use HasFactory;

    protected $table = 'guru_ppl';

    protected $fillable = ['id_user', 'nim', 'no_hp', 'alamat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function guru_ppl_absen()
    {
        return $this->hasMany(GuruPPLAbsen::class, 'id_guru_ppl');
    }
}
