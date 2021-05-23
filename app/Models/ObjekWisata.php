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

    public function InsertData($data)
    {
        DB::table('objek_wisata')->insert($data);
    }

    public function DetailData($id)
    {
        return DB::table('objek_wisata')
        ->join('kategori', 'kategori.id', '=', 'objek_wisata.id_kategori')
        ->join('kabupaten', 'kabupaten.id', '=', 'objek_wisata.id_kabupaten')
        ->where('objek_wisata.id', $id)->first();
    }

    public function UpdateData($id, $data)
    {
        DB::table('objek_wisata')->where('id', $id)->update($data);
    }

    public function DeleteData($id)
    {
        DB::table('objek_wisata')->where('id', $id)->delete();
    }
}
