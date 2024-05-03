<?php

namespace App\Http\Controllers;

use App\Models\Temp;
use Illuminate\Http\Request;

class TempController extends Controller
{
    public function create()
    {
        return view('temp');
    }
    public function store(Request $request)
    {
        $validate = $this->validate($request, ['temp' => 'required|string', 'temps' => 'required|string']);
        // Temp::create([
        //     'temp' => $request->temp
        // ]);
        $data = $validate;
        Temp::create($data);
    }
}
