<?php

namespace App\Http\Controllers\AuthHonor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LaporanHonor;
use App\LapKegiatan;
use App\Kegiatan;
use App\ListJabatan;

class UserHonorController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $kegiatans=Kegiatan::get()->count();
        $jumlahPanitia=ListJabatan::get()->count();
        $honorLengkap=LaporanHonor::where('statushonor','=','1')->count();
        $laporanLengkap=LaporanHonor::where('statuslaporan','=','1')->count();
       
        return view('user2.dasbor.dasbor',['jumlahPanitia'=>$jumlahPanitia,'kegiatans'=>$kegiatans,'honorLengkap'=>$honorLengkap,'laporanLengkap'=>$laporanLengkap]);
    }
}