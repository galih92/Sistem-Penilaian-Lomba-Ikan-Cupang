<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori','lokasi','deskripsi','cover'];

    public function ikan()
    {
    	return $this->hasMany(Ikan::class);
    }

}
