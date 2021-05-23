<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->Kategori = new Kategori();
        $this->middleware('auth');
    }

    public function index() 
    {
        $data = [
            'kategori' => $this->Kategori->AllData(), 
        ];

        return view('PageAdmin.Kategori.view-kategori', $data);
    }

    public function create() 
    {
        return view('PageAdmin.Kategori.add-kategori');
    }

    public function insert()
    {
        Request()->validate([
            'kategori' => 'required', 
            'icon' => 'required|max:1024', 
        ],
        [
            'kategori.required' => 'Tidak boleh kosong!', 
            'icon.required' => 'Tidak boleh kosong!', 
        ]);

        $file = Request()->icon;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('Icons'), $filename);

        $data = [
            'kategori' => Request()->kategori, 
            'icon' => $filename, 
        ];
        $this->Kategori->InsertData($data);
        return redirect()->route('kategori')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($id) 
    {
        $data = [
            'kategori' => $this->Kategori->DetailData($id), 
        ];

        return view('PageAdmin.Kategori.edit-kategori', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'kategori' => 'required',  
        ],
        [
            'kategori.required' => 'Tidak boleh kosong!', 
        ]);

        //jika mengganti icon
        if(Request()->icon <> "") {
            //hapus icon lama
            $kategori = $this->Kategori->DetailData($id);
            if ($kategori->icon <> "") {
                unlink(public_path('Icons').'/'.$kategori->icon);
            }

            $file = Request()->icon;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('Icons'), $filename);

            $data = [
                'kategori' => Request()->kategori, 
                'icon' => $filename, 
            ];
            $this->Kategori->UpdateData($id, $data);
        }
        //jika tidak mengganti icon
        else {
            $data = [
                'kategori' => Request()->kategori, 
            ];
            $this->Kategori->UpdateData($id, $data);
        }
        return redirect()->route('kategori')->with('pesan', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $kategori = $this->Kategori->DetailData($id);
        if ($kategori->icon <> "") {
            unlink(public_path('Icons').'/'.$kategori->icon);
        }
        
        $this->Kategori->DeleteData($id);
        return redirect()->route('kategori')->with('pesan', 'Data berhasil dihapus!');
    }
}
