<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        return view ('admin.lap_kegiatan');
    }

    public function show(){
        return view ('admin.lap_kegiatan_detail');
    }
}
