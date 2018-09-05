<?php

namespace App\Http\Controllers\Riwayat;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Mongodb\Riwayat;
use App\Honor;
use App\LaporanHonor;
use App\ListJabatan;
use App\Jabatan;
use Alert;
use PDF;
// use App\Mongodb\Honor;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kegiatan');
    }

    public function index(){
    
        return view('user1/riwayat/search');
    }

    public function search(Request $request)
    {
        $numbers=0;
        $search=$request->get('dosen_id');

        $namadosen = ListJabatan::where('dosen_id',$search)->first();
        if ($namadosen === null) {
            return redirect('pajak/riwayat')->with('error','Tidak ada honor dosen');
        }
        // $namadosen=ListJabatan::where('dosen_id',$search)->first();
        $data['riwayat']=Riwayat::where('dosen_id','all',[(int)$search])->first();
        // dd($data);
        return view('user1/riwayat/show', $data,['numbers'=>$numbers,'namadosen'=>$namadosen]);
    
    }

    public function exportpdf($id){
        $numbers=0;
        $namadosen = ListJabatan::where('dosen_id',$id)->first();
        $data['riwayat']=Riwayat::where('dosen_id','all',[(int)$id])->first();

        $pdf = PDF::loadView('user1/riwayat/pdf', $data,['numbers'=>$numbers,'namadosen'=>$namadosen]);

        return $pdf->download('Laporan Riwayat Dosen.pdf');
    }

}
