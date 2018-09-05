<?php

namespace App\Http\Controllers\Pembukuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Closure;
use App\Kegiatan;
use App\Honor;
use App\LaporanHonor;
use App\ListJabatan;
use App\UserHonor;
use App\Jabatan;

class PembukuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pembukuan');
    }

    public function index(){
    $lap_honors=LaporanHonor::where('statuslaporan','=','1')->get();
    
    return view('user3/pembukuan/index',['lap_honors'=>$lap_honors]);
    }

    public function show($id){
        $lap_honors = LaporanHonor::findOrFail($id);
        $list_jabatans= ListJabatan::where('kegiatan_id',$id)->paginate(10);
        $honors = Honor::where('lap_honor_id',$id)->paginate(10);

        return view('user3/pembukuan/show',['lap_honors'=>$lap_honors,'list_jabatans'=>$list_jabatans,
        'honors'=>$honors]); 


    }
}
