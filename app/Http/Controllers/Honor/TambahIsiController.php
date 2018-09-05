<?php

namespace App\Http\Controllers\Honor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Closure;
use App\Kegiatan;
use App\LaporanHonor;
use App\ListJabatan;
use App\UserHonor;
use App\Jabatan;

class TambahIsiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id)
    {
            $lap_honors=LaporanHonor::findOrFail($id);
            $jabatans= Jabatan::all();
            return view('user2/honor/tambahisi',['lap_honors'=>$lap_honors,'jabatans'=>$jabatans]); 
    }

    public function store(Request $request,$id)
    {
       $kegiatan=Kegiatan::findOrFail($id);
        ListJabatan::create([
            'dosen_id' => $request['dosen_id'],
            'kegiatan_id' => $kegiatan->id,
            'jabatan_id' => $request['jabatan_id']
        ]);
    }

    private function validateInput($request) {
        $this->validate($request, [
        'nama' => 'required|max:60',
        'jabatan' => 'required|max:60'
    ]);
    }
}
