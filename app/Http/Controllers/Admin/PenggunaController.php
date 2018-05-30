<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class PenggunaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
     $users = User::orderBy('fullname','asc')->paginate(10); 
     $jumlah= User::count();
     return view('admin/pengguna_list',['users'=>$users,'jumlah'=>$jumlah]);  

    }

    public function create(){
        return view('admin.pengguna_buat');
    }

    public function store(Request $request){
        $this->validateInput($request);
         User::create([
            'fullname' => $request['fullname'],
            'email'=>$request['email'],
            'jabatan'=>$request['jabatan'],
            'password'=>bcrypt($request['password']),
            'role'=>$request['role']
        ]);

        return redirect('admin/list_pengguna');
    }

    public function show(){
        return view('admin.pengguna_detail');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('admin.pengguna_edit', ['users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $user = User::FindOrFail($id);
        $constraints = [
            'fullname' => 'required|max:20',
            'email'=> 'required|max:60',
            'jabatan' => 'required|max:60',
            'role'=>'required'
            ];
        $input = [
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'jabatan' => $request['jabatan'],
            'role'=>$request['role']
        ];
        
        $this->validate($request, $constraints);
        User::where('id', $id)
            ->update($input);
        
        return redirect()->intended('admin/list_pengguna');
    }

    public function destroy($id)
    {
        $users=User::findOrFail($id);
        $users ->delete();
        return redirect()->intended('admin/list_pengguna');
       
    }


    private function validateInput($request) {
        $this->validate($request, [
        'fullname' => 'required|max:20',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'jabatan' => 'required|max:60',
        'role' => 'required'
    ]);
    }


}
