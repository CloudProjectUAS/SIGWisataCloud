<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjekWisata;

class ObjekWisataController extends Controller
{
    
    public function __construct()
    {
        $this->ObjekWisata = new ObjekWisata();
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
        return view('PageAdmin.ObjekWisata.add-objek-wisata');
    }
}
