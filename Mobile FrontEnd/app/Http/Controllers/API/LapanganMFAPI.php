<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganMFAPI extends Controller
{
    public function msc1(Request $request){

        $lapangan = Lapangan::all();

        $lapangan1 = $lapangan->where('id', 1)->first();

        return response($lapangan1);

    }

    public function msc2(Request $request){

        $lapangan = Lapangan::all();

        $lapangan2 = $lapangan->where('id', 2)->first();

        return response($lapangan2);

    }
}
