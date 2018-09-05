<?php

namespace App\Http\Controllers\Honor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use Closure;
use App\Kegiatan;
use App\LaporanHonor;
use App\ListJabatan;
use App\Honor;
use App\Jabatan;
use App\UserHonor;


use Illuminate\Http\Request;

class TambahEditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:honor');
    }
    
    public function index()
    {
        //
    }


    
    public function create($id)
    {
        $number=0;
        $lap_honors=LaporanHonor::findOrFail($id);
        $kegiatans = Kegiatan::findOrFail($id);
        $jabatans=Jabatan::all();
        $list_jabatans= ListJabatan::where('kegiatan_id',$id)->paginate(10);
        return view('user2/honor/tambahedit',['lap_honors'=>$lap_honors,'list_jabatans'=>$list_jabatans,'number'=>$number,'jabatans'=>$jabatans]);
    }

    
    public function store(Request $request,$id)
    {
      
        $kegiatan=Kegiatan::findOrFail($id);
        $list_jabatan= ListJabatan::create([
            'dosen_id' => $request['dosen_id'],
            'kegiatan_id' => $kegiatan->id,
            'jabatan_id' => $request['jabatan_id']
        ]);   

        $honor=new Honor;
        $honor->honor=$request->input('honor');
        $honor->pajak=$request->input('pajak');
        $honor->total=$request->input('total');
        $honor->lap_honor_id=$kegiatan->id;
        $honor->list_jabatan_id=$list_jabatan->id;
        $list_jabatan->honor()->save($honor);
        

        return redirect()->back()->with('success','Berita berhasil ditambah');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
