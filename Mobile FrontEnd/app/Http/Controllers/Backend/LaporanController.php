<?php

namespace App\Http\Controllers\Backend;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class LaporanController extends Controller
{
    public function index()
    {
        $optionlapang = Lapangan::all();

        return view ('dashboard.laporans.index', compact('optionlapang'),  [
            'reservasis'=> Booking::all(),
            'lapangan' =>Lapangan::all(),
        ]);
    }
}
