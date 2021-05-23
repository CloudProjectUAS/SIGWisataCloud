<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjekWisata;
use App\Models\Kabupaten;
use App\Models\Kategori;

class ObjekWisataController extends Controller
{

    public function __construct()
    {
        $this->ObjekWisata = new ObjekWisata();
        $this->Kabupaten = new Kabupaten();
        $this->Kategori = new Kategori();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'objekwisata' => $this->ObjekWisata->AllData(),
        ];

        return view('PageAdmin.ObjekWisata.view-objek-wisata', $data);
    }

    public function create()
    {
        $data = [
            'kategori' => $this->Kategori->AllData(),
            'kabupaten' => $this->Kabupaten->AllData(),
        ];
        return view('PageAdmin.ObjekWisata.add-objek-wisata', $data);
    }

    public function insert()
    {

        // dd(Request()->all());
        Request()->validate([
            'objekwisata' => 'required',
            'id_kategori' => 'required',
            'status' => 'required',
            'id_kabupaten' => 'required',
            'alamat' => 'required',
            'posisi' => 'required',
            'foto' => 'required|max:1024',
            'deskripsi' => 'required',
        ],
        [
            'objekwisata.required' => 'Tidak boleh kosong!',
            'id_kategori.required' => 'Tidak boleh kosong!',
            'status.required' => 'Tidak boleh kosong!',
            'id_kabupaten.required' => 'Tidak boleh kosong!',
            'alamat.required' => 'Tidak boleh kosong!',
            'posisi.required' => 'Tidak boleh kosong!',
            'foto.required' => 'Tidak boleh kosong!',
            'foto.max' => 'Maksimal size 1 MB !',
            'deskripsi.required' => 'Tidak boleh kosong!',
        ]);

        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('Foto'), $filename);

        //jika valid data disimpan
        $data = [
            'objek_wisata' => Request()->objekwisata,
            'id_kategori' => Request()->id_kategori,
            'status' => Request()->status,
            'id_kabupaten' => Request()->id_kabupaten,
            'alamat' => Request()->alamat,
            'posisi' => Request()->posisi,
            'foto' => $filename,
            'deskripsi' => Request()->deskripsi,
        ];
        $this->ObjekWisata->InsertData($data);
        return redirect()->route('objek-wisata')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'kategori' => $this->Kategori->AllData(),
            'kabupaten' => $this->Kabupaten->AllData(),
            'objekwisata' => $this->ObjekWisata->DetailData($id),
        ];
        return view('PageAdmin.ObjekWisata.edit-objek-wisata', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'objekwisata' => 'required',
            'id_kategori' => 'required',
            'status' => 'required',
            'id_kabupaten' => 'required',
            'alamat' => 'required',
            'posisi' => 'required',
            'foto' => 'max:1024',
            'deskripsi' => 'required',
        ],
        [
            'objekwisata.required' => 'Tidak boleh kosong!',
            'id_kategori.required' => 'Tidak boleh kosong!',
            'status.required' => 'Tidak boleh kosong!',
            'id_kabupaten.required' => 'Tidak boleh kosong!',
            'alamat.required' => 'Tidak boleh kosong!',
            'posisi.required' => 'Tidak boleh kosong!',
            'foto.max' => 'Maksimal size 1 MB !',
            'deskripsi.required' => 'Tidak boleh kosong!',
        ]);

        //jika mengganti foto
        if(Request()->foto <> "") {
            //hapus foto
            $objekwisata = $this->ObjekWisata->DetailData($id);
            if ($objekwisata->foto <> "") {
                unlink(public_path('Foto').'/'.$objekwisata->foto);
            }

            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('Foto'), $filename);

            $data = [
                'objek_wisata' => Request()->objekwisata,
                'id_kategori' => Request()->id_kategori,
                'status' => Request()->status,
                'id_kabupaten' => Request()->id_kabupaten,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'foto' => $filename,
                'deskripsi' => Request()->deskripsi,
            ];
            $this->ObjekWisata->UpdateData($id, $data);
        }
        //jika tidak mengganti icon
        else {
            $data = [
                'objek_wisata' => Request()->objekwisata,
                'id_kategori' => Request()->id_kategori,
                'status' => Request()->status,
                'id_kabupaten' => Request()->id_kabupaten,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'deskripsi' => Request()->deskripsi,
            ];
            $this->ObjekWisata->UpdateData($id, $data);
        }
        return redirect()->route('objek-wisata')->with('pesan', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $objekwisata = $this->ObjekWisata->DetailData($id);
        if ($objekwisata->foto <> "") {
            unlink(public_path('Foto').'/'.$objekwisata->foto);
        }

        $this->ObjekWisata->DeleteData($id);
        return redirect()->route('objek-wisata')->with('pesan', 'Data berhasil dihapus!');
    }
}
