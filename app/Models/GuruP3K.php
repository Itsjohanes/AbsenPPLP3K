<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruP3K extends Model
{
    use HasFactory;

    protected $table = 'guru_p3k';

    protected $fillable = ['id_user', 'nim', 'no_hp', 'alamat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function guru_p3k_absen()
    {
        return $this->hasMany(GuruP3KAbsen::class, 'id_guru_p3k');
    }
}
