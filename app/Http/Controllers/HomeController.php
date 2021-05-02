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
        ];

        return view('PageUser.home', $data);
    }
}
