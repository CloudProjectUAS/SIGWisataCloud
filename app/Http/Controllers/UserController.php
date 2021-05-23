<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'user' => $this->UserModel->AllData(),
        ];

        return view('PageAdmin.User.view-user', $data);
    }

    public function create()
    {
        return view('PageAdmin.User.add-user');
    }

    public function insert()
    {
        Request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'level' => 'required',
            'password' => 'required|min:8',
            'foto' => 'required|max:1024',
        ],
        [
            'name.required' => 'Tidak boleh kosong!',
            'email.required' => 'Tidak boleh kosong!',
            'email.unique' => 'Email telah terdaftar! Silakan daftar dengan email lain',
            'level.required' => 'Tidak boleh kosong!',
            'password.required' => 'Tidak boleh kosong!',
            'password.min' => 'Password kurang dari 8 karakter!',
            'foto.required' => 'Tidak boleh kosong!',
        ]);

        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('User'), $filename);

        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'level' => Request()->level,
            'password' => Hash::make(Request()->password),
            'foto' => $filename,
        ];
        $this->UserModel->InsertData($data);
        return redirect()->route('user')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'user' => $this->UserModel->DetailData($id),
        ];

        return view('PageAdmin.User.edit-user', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required|min:8',
        ],
        [
            'name.required' => 'Tidak boleh kosong!',
            'email.required' => 'Tidak boleh kosong!',
            'level.required' => 'Tidak boleh kosong!',
            'password.required' => 'Tidak boleh kosong!',
            'password.min' => 'Password kurang dari 8 karakter!',
        ]);

        //jika mengganti foto
        if(Request()->foto <> "") {
            //hapus foto lama
            $user = $this->UserModel->DetailData($id);
            if ($user->foto <> "") {
                unlink(public_path('User').'/'.$user->foto);
            }

            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('User'), $filename);

            $data = [
                'name' => Request()->name,
                'level' => Request()->level,
                'foto' => $filename,
            ];
            $this->UserModel->UpdateData($id, $data);
        }
        //jika tidak mengganti foto
        else {
            $data = [
                'name' => Request()->name,
                'level' => Request()->level,
            ];
            $this->UserModel->UpdateData($id, $data);
        }
        return redirect()->route('user')->with('pesan', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $user = $this->UserModel->DetailData($id);
        if ($user->foto <> "") {
            unlink(public_path('User').'/'.$user->foto);
        }

        $this->UserModel->DeleteData($id);
        return redirect()->route('user')->with('pesan', 'Data berhasil dihapus!');
    }
}
