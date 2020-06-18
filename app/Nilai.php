<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['ikan_id','warna','gerak','sirip','dasi','ekor','cacat','total_nilai'];

    public function ikan(){
    	return $this->hasOne('ikan,id_ikan');
    }
}
