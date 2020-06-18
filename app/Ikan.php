<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    protected $table = 'ikan';
    protected $fillable = ['id_ikan','peserta_id','kategori_id','status'];


 	public function peserta()
    {
    	return $this->belongsTo(Peserta::class);
    }

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class);
    }




}
