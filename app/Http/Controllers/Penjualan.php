<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use Illuminate\Http\Request;

class Penjualan extends Controller
{
    protected $penjualanModel;

    function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
    }

    public function index()
    {

        $data = [
            'penjualan' =>  $this->penjualanModel->getPenjualan()->get()
        ];
        return view('penjualan', $data);
    }
}
