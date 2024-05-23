<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Booking;
use App\Models\User;
use App\Models\Lapangan;
use App\Models\Rekening;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Mahendrik',
            'username' => 'Admin Mahendrik',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '082219833132',
            'alamat' => 'Jl. Kapuknahun No.09, Kec. Cisalak, Kab. Subang, Jawa Barat',
            'role' => 'Administrator'

        ]);

        Lapangan::create([
            'nama_lapangan' => 'Mahendrik Sport Centre I',
            'detail' => 'Kp. Kapuknahun RT 03/02, Darmaga, Kec. Cisalak, Kabupaten Subang, Jawa Barat 41283',
            'harga_sewa' => 140000
        ]);

        Lapangan::create([
            'nama_lapangan' => 'Mahendrik Sport Centre II',
            'detail' => 'Kec. Cijambe, Kab. Subang, Prov. Jawa Barat',
            'harga_sewa' => 140000
        ]);

        Rekening::create([
            'no_rekening' => '3210921211',
            'atas_nama' => 'Yopi Mahendrik',
            'nama_bank' => 'BCA'
        ]);

        Rekening::create([
            'no_rekening' => '0322189661',
            'atas_nama' => 'Dadang Nurjaman',
            'nama_bank' => 'BNI'
        ]);

        Booking::create([
            'id_pelanggan' => 1,
            'nama_tim' => 'Karider FC',
            'tanggal' => '2023-06-17',
            'id_lapangan' => '1',
            'waktu_mulai' => "20.00",
            'waktu_selesai' => "21.00",
            'biaya' => 140000,
            'tipe' => 'Futsal',
            'status' => 'Lunas'
        ]);

        Booking::create([
            'id_pelanggan' => 1,
            'nama_tim' => 'MF Team',
            'tanggal' => '2023-06-17',
            'id_lapangan' => '1',
            'waktu_mulai' => "12.00",
            'waktu_selesai' => "13.00",
            'biaya' => 140000,
            'tipe' => 'Futsal',
            'status' => 'Lunas'
        ]);

        Booking::create([
            'id_pelanggan' => 1,
            'nama_tim' => 'MF Senior',
            'tanggal' => '2023-06-19',
            'id_lapangan' => '1',
            'waktu_mulai' => "11.00",
            'waktu_selesai' => "12.00",
            'biaya' => 140000,
            'tipe' => 'Futsal',
            'status' => 'Lunas'
        ]);

        Booking::create([
            'id_pelanggan' => 1,
            'nama_tim' => 'MF Senior',
            'tanggal' => '2023-06-19',
            'id_lapangan' => '1',
            'waktu_mulai' => "13.00",
            'waktu_selesai' => "14.00",
            'biaya' => 140000,
            'tipe' => 'Futsal',
            'status' => 'Lunas'
        ]);

        Booking::create([
            'id_pelanggan' =>'1',
            'nama_tim' => 'MF Senior',
            'tanggal' => '2023-06-20',
            'id_lapangan' => '1',
            'waktu_mulai' => "13.00",
            'waktu_selesai' => "14.00",
            'biaya' => 140000,
            'tipe' => 'Futsal',
            'status' => 'Lunas'
        ]);

        Booking::create([
            'id_pelanggan' => 1,
            'nama_tim' => 'MF Senior',
            'tanggal' => '2023-06-20',
            'id_lapangan' => '1',
            'waktu_mulai' => "08.00",
            'waktu_selesai' => "12.00",
            'biaya' => 140000,
            'tipe' => 'Futsal',
            'status' => 'Lunas'
        ]);

    }

    
}
