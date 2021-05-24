<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use phpDocumentor\Reflection\Types\This;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->Home = new Home();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'kabupaten' => $this->Home->DataKabupaten(),
            'kategori' => $this->Home->DataKategori(),
            'objekwisata' => $this->Home->AllDataObjekWisata(),
        ];

        return view('PageUser.home', $data);
    }

    public function kabupaten($id)
    {
        $kab = $this->Home->DetailKabupaten($id);
        $data = [
            'title' => $kab->kabupaten,
            'kabupaten' => $this->Home->DataKabupaten(),
            'kategori' => $this->Home->DataKategori(),
            'objekwisata' => $this->Home->DataObjekWisata($id),
            'kab' => $kab,
        ];

        return view('PageUser.home-kabupaten', $data);
    }

    public function kategori($id)
    {
        $kat = $this->Home->DetailKategori($id);
        $data = [
            'title' => $kat->kategori,
            'kabupaten' => $this->Home->DataKabupaten(),
            'kategori' => $this->Home->DataKategori(),
            'objekwisata' => $this->Home->DataObjekWisataKategori($id),
        ];

        return view('PageUser.home-kategori', $data);
    }

    public function detailobjekwisata($id)
    {
        $objekwisata = $this->Home->DetailDataObjekWisata($id);
        $data = [
            'title' => $objekwisata->objek_wisata,
            'kabupaten' => $this->Home->DataKabupaten(),
            'kategori' => $this->Home->DataKategori(),
            'objekwisata' => $objekwisata,
        ];

        return view('PageUser.home-detail-objek', $data);
    }
}
