<?php

namespace App\Http\Controllers\Backend;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Type\Integer;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.lapangans.index', [
            'lapangans'=> Lapangan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.lapangans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lapangan' => 'required',
            'detail' => 'required',
            'harga_sewa' => 'required|integer',
        ]);

        Lapangan::create($validatedData);

        return redirect ('/dashboard/lapangans')->with('success', 'New Data added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lapangan $lapangan)
    {
        return view('dashboard.lapangans.show', [
            'lapangan' => $lapangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lapangan = Lapangan::find($id);
        return view('dashboard.lapangans.edit', compact(['lapangan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lapangan = Lapangan::find($id);

        $rules = ([
            'nama_lapangan' => '',
            'detail' => '',
            'harga_sewa' => 'integer',
        ]);

        $validatedData = $request->validate($rules);


        Lapangan::where('id', $lapangan->id)
            ->update($validatedData);

        
        return redirect ('/dashboard/lapangans')->with('success', 'Data has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {
            Lapangan::destroy($id);
    
            return redirect ('/dashboard/lapangans')->with('success', 'Data Lapangan has been deleted!');
        }
    }
}
