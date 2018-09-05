<?php

namespace App\Http\Controllers\AuthPembukuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LaporanHonor;
use App\ListJabatan;

class UserPembukuanController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:pembukuan');
    }
   
    // Dasbor
    public function index()
    {
        $jumlahDosens= ListJabatan::get()->count();
        $jumlahHonor = LaporanHonor::get()->count();
        return view('user3/dasbor/dasbor',['jumlahDosens'=>$jumlahDosens,'jumlahHonor'=>$jumlahHonor]);
    }
}