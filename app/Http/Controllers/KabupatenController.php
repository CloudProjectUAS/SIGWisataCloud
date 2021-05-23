<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use Symfony\Contracts\Service\Attribute\Required;

class KabupatenController extends Controller
{
    public function __construct()
    {
        $this->Kabupaten = new Kabupaten();
        $this->middleware('auth');
    }

    public function index()
    {
        $dataKab = [
            'kabupaten' => $this->Kabupaten->AllData(),
        ];

        return view('PageAdmin.Kabupaten.view-kabupaten', $dataKab);
    }

    public function create()
    {
        return view('PageAdmin.Kabupaten.add-kabupaten');
    }

    public function insert()
    {
        Request()->validate([
            'kabupaten' => 'required',
            'warna' => 'required',
            'geojson' => 'required',
        ],
        [
            'kabupaten.required' => 'Tidak boleh kosong!',
            'warna.required' => 'Tidak boleh kosong!',
            'geojson.required' => 'Tidak boleh kosong!',
        ]);
        //jika valid data disimpan
        $data = [
            'kabupaten' => Request()->kabupaten,
            'warna' => Request()->warna,
            'geojson' => Request()->geojson,
        ];
        $this->Kabupaten->InsertData($data);
        return redirect()->route('kabupaten')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'kabupaten' => $this->Kabupaten->DetailData($id),
        ];

        return view('PageAdmin.Kabupaten.edit-kabupaten', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'kabupaten' => 'required',
            'warna' => 'required',
            'geojson' => 'required',
        ],
        [
            'kabupaten.required' => 'Tidak boleh kosong!',
            'warna.required' => 'Tidak boleh kosong!',
            'geojson.required' => 'Tidak boleh kosong!',
        ]);
        //jika valid data disimpan
        $data = [
            'kabupaten' => Request()->kabupaten,
            'warna' => Request()->warna,
            'geojson' => Request()->geojson,
        ];
        $this->Kabupaten->UpdateData($id, $data);
        return redirect()->route('kabupaten')->with('pesan', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $this->Kabupaten->DeleteData($id);
        return redirect()->route('kabupaten')->with('pesan', 'Data berhasil dihapus!');
    }
}
