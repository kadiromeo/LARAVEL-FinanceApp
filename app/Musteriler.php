<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Musteriler extends Model
{
    protected $guarded = [];

    static function getPublicName($id)
    {
        $data = Musteriler::where('id',$id)->get();
        if($data[0]['musteriTipi'] == 0){
            return $data[0]['ad']." ".$data[0]['soyad'];
        }
        else
        {
            return $data[0]['firmaAdi'];
        }
    }
}
