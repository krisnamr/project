<?php

namespace App\Http\Controllers\AuthKegiatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mongodb\Riwayat;
use App\LaporanHonor;

class UserKegiatanController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:kegiatan');
    }
   
    // Dasbor
    public function index()
    {
        $jumlahDosens =Riwayat::get()->count();
        $jumlahHonor = LaporanHonor::get()->count();
        return view('user1/dasbor/dasbor',['jumlahDosens'=>$jumlahDosens,'jumlahHonor'=>$jumlahHonor]);
    }
}