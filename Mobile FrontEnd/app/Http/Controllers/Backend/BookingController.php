<?php

namespace App\Http\Controllers\Backend;


use App\Models\Jadwal;
use App\Models\Booking;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $optionlapang = Lapangan::all();

        return view ('dashboard.bookings.index', compact('optionlapang'),  [
            'reservasis'=> Booking::all(),
            'lapangan' =>Lapangan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_tim' => 'required|min:3',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tanggal' => 'required',
            'tipe' => 'required',
            'biaya' => 'required',
            'id_lapangan' => 'required'
        ]);
        $validatedData['id_pelanggan'] = auth()->user()->id;
        Booking::create($validatedData);
        return redirect ('/dashboard/bookings')->with('success', 'New Data Reservasi added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('dashboard.bookings.show', [
            'reservasi' => $booking
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $optionlapang = Lapangan::all();
        $reservasi = Booking::find($id);
        return view('dashboard.bookings.edit', compact(['reservasi', 'optionlapang']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reservasi = Booking::find($id);
        // $jadwal = Jadwal::all();

        $rules = ([
            'nama_tim' => '',
            'tanggal' => '',
            'waktu_mulai' => '',
            'waktu_selesai' => '',
            'biaya' => '',
            'tipe' => '',
            'status' => '',
        ]);

        $validatedData = $request->validate($rules);


        Booking::where('id', $reservasi->id)
            ->update($validatedData);

        
        return redirect ('/dashboard/bookings')->with('success', 'Data Reservasi has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Booking::destroy($id);

        return redirect ('/dashboard/bookings')->with('success', 'Data has been deleted!');
    }
}
