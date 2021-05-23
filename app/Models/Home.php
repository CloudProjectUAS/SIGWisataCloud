<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    public function DataKabupaten()
    {
        return DB::table('kabupaten')->get();
    }

    public function DataKategori()
    {
        return DB::table('kategori')->get();
    }

    public function DetailKategori($id)
    {
        return DB::table('kategori')->where('id', $id)->first();
    }

    public function DataObjekWisataKategori($id)
    {
        return DB::table('objek_wisata')
        ->join('kategori', 'kategori.id', '=', 'objek_wisata.id_kategori')
        ->join('kabupaten', 'kabupaten.id', '=', 'objek_wisata.id_kabupaten')
        ->where('objek_wisata.id_kabupaten', $id)
        ->get();
    }

    public function DetailKabupaten($id)
    {
        return DB::table('kabupaten')->where('id', $id)->first();
    }

    public function DataObjekWisata($id)
    {
        return DB::table('objek_wisata')
        ->join('kategori', 'kategori.id', '=', 'objek_wisata.id_kategori')
        ->join('kabupaten', 'kabupaten.id', '=', 'objek_wisata.id_kabupaten')
        ->where('objek_wisata.id_kabupaten', $id)
        ->get();
    }

    public function AllDataObjekWisata()
    {
        return DB::table('objek_wisata')
        ->join('kategori', 'kategori.id', '=', 'objek_wisata.id_kategori')
        ->join('kabupaten', 'kabupaten.id', '=', 'objek_wisata.id_kabupaten')
        ->get();
    }
}
