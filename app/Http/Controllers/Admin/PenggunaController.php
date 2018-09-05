<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserHonor;
use App\UserKegiatan;
use App\UserPembukuan;

class PenggunaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    
     $user2= UserHonor::paginate(5);
     $jumlah2= UserHonor::count();
     $number=0;
     $user1 = UserKegiatan::paginate(5); 
     $user3=UserPembukuan::paginate(5);
     $jumlah1= UserKegiatan::count();
     $numbers=0;
     return view('admins/akun/index',['user2'=>$user2,'user1'=>$user1,
     'jumlah2'=>$jumlah2,'jumlah1'=>$jumlah1,'numbers'=>$numbers,'number'=>$number,'user3'=>$user3]);  

    }

    public function create(){
        return view('admins.akun.create');
    }

    public function store(Request $request){
        $this->validateInput($request);
         UserHonor::create([
            'fullname' => $request['fullname'],
            'email'=>$request['email'],
            'jabatan'=>$request['jabatan'],
            'password'=>bcrypt($request['password']),
        ]);
        

        return redirect('admin/akunhonor');
    }

    public function show(){
       
    }

    public function edit($id)
    {
        $user2 = UserHonor::findOrFail($id);

        return view('admins/akun/edit', ['user2' => $user2]);
    }

    public function update(Request $request, $id)
    {
        $user2 = UserHonor::FindOrFail($id);
        $constraints = [
            'fullname' => 'required|max:20',
            'email'=> 'required|max:60',
            'jabatan' => 'required|max:60',
            ];
        $input = [
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'jabatan' => $request['jabatan'],
            'password'=>bcrypt($request['password']),
        ];
        
        $this->validate($request, $constraints);
        UserHonor::where('id', $id)
            ->update($input);
        
        // return redirect()->intended('admin/list_pengguna');
        return redirect('admin/akunhonor');
    }

    public function destroy($id)
    {
        $user2=UserHonor::findOrFail($id);
        $user2 ->delete();
        return redirect()->intended('admin/akunhonor');
       
    }
    private function validateInput($request) {
        $this->validate($request, [
        'fullname' => 'required|max:20',
        'email' => 'required|email|max:255|unique:user_honors',
        'password' => 'required|min:6|confirmed',
        'jabatan' => 'required|max:60',
       
    ]);
    }


}
