<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Kegiatan;
use App\UserHonor;
use App\UserKegiatan;
use App\LaporanHonor;
use App\ListJabatan;

class AdminController extends Controller

{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    // Dasbor
    public function index(){
        $userHonors = UserHonor::get()->count();
        $userPajaks = UserKegiatan::get()->count();
        $laporanHonors = LaporanHonor::get()->count();
        $panitias = ListJabatan::get()->count();

        return view('admins.dasbor.dasbor',['userHonors'=>$userHonors,'userPajaks'=>$userPajaks,
        'laporanHonors'=>$laporanHonors,'panitias'=>$panitias]);
    }
}