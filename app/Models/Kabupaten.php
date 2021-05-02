<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kabupaten extends Model
{
    public function AllData()
    {
        return DB::table('kabupaten')->get();
    }

    public function InsertData($data)
    {
        DB::table('kabupaten')->insert($data);
    }

    public function DetailData($id)
    {
        return DB::table('kabupaten')->where('id', $id)->first();
    }

    public function UpdateData($id, $data)
    {
        DB::table('kabupaten')->where('id', $id)->update($data);
    }

    public function DeleteData($id)
    {
        DB::table('kabupaten')->where('id', $id)->delete();
    }
}
