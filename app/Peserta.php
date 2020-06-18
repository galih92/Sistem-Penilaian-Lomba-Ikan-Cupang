<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $fillable = ['nama_peserta','tlfn','alamat'];

	public function ikan()
    {
    	return $this->hasMany(Ikan::class);
    }



}
