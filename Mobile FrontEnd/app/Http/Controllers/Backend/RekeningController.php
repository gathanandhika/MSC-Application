<?php

namespace App\Http\Controllers\Backend;

use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.rekenings.index', [
            'rekenings' => Rekening::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.rekenings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'atas_nama' => 'required',
            'no_rekening' => 'required',
            'nama_bank' => 'required',
        ]);

        Rekening::create($validatedData);

        return redirect ('/dashboard/rekenings')->with('success', 'New Data added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rekening $rekening)
    {
        return view('dashboard.rekenings.show', [
            'rekening' => $rekening
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rekening = Rekening::find($id);
        return view('dashboard.rekenings.edit', compact(['rekening']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rekening = Rekening::find($id);

        $rules = ([
            'atas_nama' => 'required',
            'no_rekening' => 'required|integer',
            'nama_bank' => 'required',
        ]);

        $validatedData = $request->validate($rules);

        Rekening::where('id', $rekening->id)
            ->update($validatedData);

        
        return redirect ('/dashboard/rekenings')->with('success', 'Data Rekening has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rekening::destroy($id);

        return redirect ('/dashboard/rekenings')->with('success', 'Data Rekening has been deleted!');
    }
}
