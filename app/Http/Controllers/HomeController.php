<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::table('academic_years')->where('aktif', 1)->get();
        return view('pages.home', compact('data'));
    }
}
