<?php

namespace App\Http\Controllers\Kegiatan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Kegiatan;
use Auth;
use App\LaporanHonor;

class KegiatanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
   
   public function create(){
       return view ('user2/kegiatan/create');
   }

   public function store(Request $request){

       $this->validateInput($request);
       $kegiatan=new Kegiatan;
       $kegiatan->nama_kegiatan=$request->input('nama_kegiatan');
       $kegiatan->tgl_pelaksanaan=$request->input('tgl_pelaksanaan');
       $kegiatan->tempat=$request->input('tempat');
       $kegiatan->save();

       $lap_honor=new LaporanHonor;
       $lap_honor->id=$kegiatan->id;
       $lap_honor->kegiatan_id=$kegiatan->id;
       $lap_honor->save();
       return redirect()->back();
   }

   private function validateInput($request) {
       $this->validate($request, [
       'nama_kegiatan' => 'required|max:60|unique:kegiatan',
       'tempat' => 'required|max:60',
       'tgl_pelaksanaan' => 'required'
       ]);
}
}
