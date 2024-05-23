<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningAPI extends Controller
{

    public function rekeninglist(Request $request){
        // $user = $request->user();
        // $anak = Booking::where('id_user', $user['id'])->first();

        // return response($anak);

        $rekeninglist = Rekening::all();

        return response($rekeninglist);

    }

}
