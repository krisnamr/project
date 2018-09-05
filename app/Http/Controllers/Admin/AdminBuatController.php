<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;


class AdminBuatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $admins = Admin::paginate(10); 
        $jumlah= Admin::count();
        $number=0;
        return view('admins/adminbuat/index',['admins'=>$admins,
        'jumlah'=>$jumlah,'number'=>$number]);  

    }

    public function create(){
        return view('admins.adminbuat.create');
    }

    public function store(Request $request){
        $this->validateInput($request);
         Admin::create([
            'fullname' => $request['fullname'],
            'email'=>$request['email'],
            'jabatan'=>$request['jabatan'],
            'password'=>bcrypt($request['password']),
        ]);

        return redirect('admin/akunadmin');
    }


    public function edit($id)
    {
        $admins = Admin::findOrFail($id);

        return view('admins/adminbuat/edit', ['admins' => $admins]);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::FindOrFail($id);
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
        Admin::where('id', $id)
            ->update($input);
        
        
        return redirect('admin/akunadmin');
    }

    public function destroy($id)
    {
        $admins=Admin::findOrFail($id);
        $admins ->delete();
        return redirect()->intended('admin/akunadmin');
       
    }


    private function validateInput($request) {
        $this->validate($request, [
        'fullname' => 'required|max:20',
        'email' => 'required|email|max:255|unique:admins',
        'password' => 'required|min:6|confirmed',
        'jabatan' => 'required|max:60',
        
    ]);
    }
}
