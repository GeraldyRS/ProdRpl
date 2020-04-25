<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['id_jadwal','tanggal','mulai','selesai','kegiatan','lampiran','mapel','bukti','status'];
}
