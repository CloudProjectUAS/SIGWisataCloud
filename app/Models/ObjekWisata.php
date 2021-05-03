<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ObjekWisata extends Model
{
    public function AllData()
    {
        return DB::table('objek_wisata')
        ->join('kategori', 'kategori.id', '=', 'objek_wisata.id_kategori')
        ->join('kabupaten', 'kabupaten.id', '=', 'objek_wisata.id_kabupaten')
        ->get();
    }
}
