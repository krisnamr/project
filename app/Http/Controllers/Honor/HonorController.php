<?php

namespace App\Http\Controllers\Honor;

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
use App\Mongodb\Riwayat;
use App\Mongodb\Honor as MongodbHonor;
use PDF;
use Alert;



class HonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $number = 0;
        $lap_honors=LaporanHonor::paginate(20); 

        return view('user2/honor/index',['lap_honors'=>$lap_honors,'number'=>$number]);          
        
    }

    
    public function create($id)
    {
        
        $number=0;
        $lap_honors=LaporanHonor::findOrFail($id);
        $kegiatans = Kegiatan::findOrFail($id);
        $list_jabatans= ListJabatan::where('kegiatan_id',$id)->paginate(10);
        $jabatans=Jabatan::all();

        return view('user2/honor/form',['lap_honors'=>$lap_honors,'list_jabatans'=>$list_jabatans,'number'=>$number,'jabatans'=>$jabatans]);
        
        // return view ('coba');
    }

    
    public function storedata(Request $request,$id)
    {     
        $lap_honor = LaporanHonor::findOrFail($id);
        $lap_honor->statushonor='1';
        $lap_honor->pembuat_id= Auth::user()->id;
        $lap_honor->save();   

        $lap_honor=LaporanHonor::findOrFail($id);
        $data = $request->except(['_method', '_token']);
        foreach ($data as $key => $value) {
            $jenis = explode('-', $key)[0];
            $id = explode('-', $key)[1];
            if($jenis == 'honor') {
                $honor = new Honor();
                $listjabatan= ListJabatan::findOrFail($id);
                $honor->list_jabatan_id= $listjabatan->id;
                $honor->lap_honor_id=$lap_honor->id;
                $honor->honor = $data['honor-' . $id];
                $honor->pajak = $data['pajak-' . $id];
                $honor->total = $data['total-' . $id];
                $honor->save();
            }
        }
       // return redirect ('honor/honordosen');
    }
        

   
    public function show($id)
    {

    }
    
    public function edit($id)
    {   
        $lap_honors = LaporanHonor::findOrFail($id);
        $kegiatans = Kegiatan::findOrFail($id);
        // $user_honors = UserHonor::findOrFail($id);
        $jabatans =Jabatan::all();
        $list_jabatans= ListJabatan::where('kegiatan_id',$id)->paginate(10);
        $honors = Honor::where('lap_honor_id',$id)->paginate(10);

        return view('user2/honor/edit',['lap_honors'=>$lap_honors,'kegiatans'=>$kegiatans,'list_jabatans'=>$list_jabatans,
        'honors'=>$honors,'jabatans'=>$jabatans]); 

        // return "haloo";

        // return view('user2/honor/edit');
        
        
    }

    
    public function update(Request $request, $id)
    {
        $laporanHonor = LaporanHonor::findOrFail($id);
        $laporanHonor->pembuat_id= Auth::user()->id;
        $laporanHonor->save();
        
        if ($request->input())
        {
            $ids = $request->input('id');
            $list_jabatan_ids = $request->input('list_jabatan_id');
            $lap_honor_id = $id;
            $honors = $request->input('honor');
            $pajaks = $request->input('pajak');
            $totals = $request->input('total');

            foreach ($ids as $i => $honorId)
            {
                $honor = Honor::findOrFail($honorId);
                $honor->list_jabatan_id = $list_jabatan_ids[$i];
                $honor->lap_honor_id = $lap_honor_id;
                $honor->honor = $honors[$i];
                $honor->pajak = $pajaks[$i];
                $honor->total = $totals[$i];
                $honor->save();
            }
        }

        //return redirect()->back();
    }

    
    public function destroy($id)
    {
        $laporanHonor = LaporanHonor::findOrFail($id);
        $honor= $laporanHonor->where('statuslaporan','=','0'); 
        if ($honor===true){
         $honor->delete(); 
        
        }else{
        
        if ($laporanHonor->honors) {
            foreach ($laporanHonor->honors as $honor) {
                $riwayat = Riwayat::where('dosen_id', $honor->list_jabatan->dosen_id)->first();

                if ($riwayat) {
                    if ($riwayat->honor) {
                        // $riwayatHonorsNew = $riwayat->honor->reject(function ($riwayatHonor) use ($honor) {
                        //     return $riwayatHonor->honor_id == $honor->id;
                        // });
                        // $riwayat->honor()->delete();

                        // foreach ($riwayatHonorsNew as $riwayatHonorNew) {
                        //     $riwayat->honor()->save($riwayatHonorNew);
                        // }
                        
                        \DB::connection('mongodb')->collection('dosen')->where('dosen_id', $honor->list_jabatan->dosen_id)
                            ->pull('honor', ['honor_id' => $honor->id]);
                    }
                }
                if (! $riwayat->honor) {
                    $riwayat->delete();
                }
            }
        }

        $laporanHonor->delete();
    }
    }

    public function delete($id)
    {
        $list_jabatan=ListJabatan::findOrFail($id);
        $list_jabatan->delete();

        return redirect()->back();
    }

    public function exportpdf($id){
        $number=0;
        $lap_honors = LaporanHonor::findOrFail($id);
        $kegiatans = Kegiatan::findOrFail($id);
        $list_jabatans= ListJabatan::where('kegiatan_id',$id)->paginate(10);
        $honors = Honor::where('lap_honor_id',$id)->paginate(10);

        $pdf = PDF::loadView('user2/honor/pdf', ['number'=>$number,'kegiatans' => $kegiatans,
        'lap_honors' => $lap_honors,'list_jabatans' => $list_jabatans,'honors'=>$honors]);

        return $pdf->download('Laporan Honor Dosen.pdf');
    }

    public function IsiOnline($id){
        $number=0;
        $lap_honors=LaporanHonor::findOrFail($id);
        $kegiatans = Kegiatan::findOrFail($id);
        $jabatans= Jabatan::all();
        $list_jabatans= ListJabatan::where('kegiatan_id',$id)->paginate(10);
        return view('user2/honor/isionline',['lap_honors'=>$lap_honors,'list_jabatans'=>$list_jabatans,'number'=>$number,'jabatans'=>$jabatans]);
    }

    public function IsiOffline($id){
        
        $number=0;
        $lap_honors=LaporanHonor::findOrFail($id);
        

        $kegiatans = Kegiatan::findOrFail($id);
        $jabatans= Jabatan::all();
        $list_jabatans= ListJabatan::where('kegiatan_id',$id)->paginate(10);

        return view('user2/honor/isioffline',['lap_honors'=>$lap_honors,'list_jabatans'=>$list_jabatans,'number'=>$number,'jabatans'=>$jabatans]);
    }

    private function validateInput($request) {
        $this->validate($request, [
        'honor' => 'required',
        'pajak' => 'required',
        'total' => 'required',
    ]);
    }

    public function exportExcel(Request $request, $lapHonorId)
    {
        $lap_honor = LaporanHonor::findOrFail($lapHonorId);
        $lap_honor->statushonor='1';
        $lap_honor->pembuat_id= Auth::user()->id;
        $lap_honor->save(); 

        \Excel::create('Laporan Honor', function($excel) use ($lapHonorId) {

            $excel->sheet('Honor Panitia', function($sheet) use ($lapHonorId) {
                
                $data['lapHonorId'] = $lapHonorId;
                $data['listJabatans'] = ListJabatan::where('kegiatan_id',$lapHonorId)->get();
                $sheet->loadView('user2/honor/exportExcel', $data);
        
            });
        
        })->download('xls');

        return redirect()->back();
    }

    public function importExcel(\App\Http\Requests\Honor\Honor\ImportExcelRequest $request)
    {  

        if ($request->hasFile('file'))
        {
            $path = $request->file('file')->path();
            
            \Excel::load($path, function($reader) {
                $results = $reader->all();
                // dump($results);
                
                if ($results) {
                    foreach ($results as $row) {
                        $honor = Honor::firstOrNew([
                            'list_jabatan_id' => $row->list_jabatan_id,
                            'lap_honor_id' => $row->lap_honor_id,
                        ]);
                        $honor->honor = $row->honor;
                        $honor->pajak = $row->pajak;
                        $honor->total = $row->honor - ($row->honor * $row->pajak);
                        $honor->save();
                    }             
                }
            
            });
        }

        return redirect()->action('Honor\HonorController@index')->with('success','Data Honor Berhasil Terinput');
    }

    /**
     * Riwayat
     * [
     *      'id',
     *      'dosen_id',
     *      'dosen_fullname',
     *      'honor' => [
     *          [
     *              'honor',
     *              'pajak',
     *              'total',
     *              'nama_kegiatan',
     *              'jabatan',
     *          ],
     *          ...
     *      ],
     * ]
     */
    public function complete(Request $request, $id)
    {
        $laporanHonor = LaporanHonor::findOrFail($id);
        $laporanHonor->statuslaporan='1';
        $laporanHonor->save();

        foreach ($laporanHonor->honors as $honor) {
            $riwayat = Riwayat::where('dosen_id', $honor->list_jabatan->dosen_id)->first();

            if (! $riwayat) {
                $riwayat = new Riwayat;
            }

            $riwayat->dosen_id = $honor->list_jabatan->dosen_id;
            $riwayat->save();

            \DB::connection('mongodb')->collection('dosen')->where('dosen_id', $honor->list_jabatan->dosen_id)
                ->push(
                    'honor',
                    [
                        'honor_id' => $honor->id,
                        'honor' => $honor->honor,
                        'pajak' => $honor->pajak,
                        'total' => $honor->total,
                        'nama_kegiatan' => $honor->list_jabatan->kegiatan->nama_kegiatan,
                        'jabatan' => $honor->list_jabatan->jabatan->nama_jabatan,
                    ],
                    true
                );
            
            // dump($riwayat);
        } 
        return redirect()->back();
    }

}
