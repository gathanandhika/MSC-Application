<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingAPI extends Controller
{
    public function store(Request $request)
    {
        $id = $request->user()->id;
        $data = $request->validate([
            'id_lapangan' => 'required',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'biaya' => 'required|integer',
            'nama_tim' => 'required|string',
            'tipe' => 'required|string',
        ]);
        $user = User::find($id);
        $booking = Booking::create([
            'id_lapangan' => $data['id_lapangan'],
            'tanggal' => $data['tanggal'],
            'waktu_mulai' => $data['waktu_mulai'],
            'waktu_selesai' => $data['waktu_selesai'],
            'biaya' => $data['biaya'],
            'nama_tim' => $data['nama_tim'],
            'tipe' => $data['tipe'],
            'status' => '',
            'id_pelanggan' => $user->id
        ]);

        $response = [
            'message' => 'Data Berhasil ditambah',
            'data_booking' => $booking
        ];

        return response($response, 201);
    }

    public function booklist(Request $request){

        $booklist = Booking::all();

        return response($booklist);

    }

    public function urbook(Request $request){
        $user = $request->user();
        $urbook = Booking::where('id_user', $user['id'])->first();

        return response($urbook);


    }

}