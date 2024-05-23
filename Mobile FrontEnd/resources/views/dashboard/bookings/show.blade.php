@extends('dashboard.dash-layout.main')

@section('container')
<div class="table-responsive col-lg-12">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Lapangan</h1>
        </div>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nama</th>
              <td> {{ $reservasi->user->name }} </td>
            </tr>
            <tr>
              <th scope="col">Nama Tim</th>
              <td> {{ $reservasi->nama_tim }} </td>
            </tr>
            <tr>
              <th scope="col">Lapangan</th>
              <td> {{ $reservasi->lapangan->nama_lapangan }} </td>
            </tr>
            <tr>
              <th scope="col">Tanggal</th>
              <td> {{ $reservasi->tanggal }} </td>
            </tr>
            <tr>
              <th scope="col">Waktu</th>
              <td> {{ $reservasi->waktu_mulai }} - {{ $reservasi->waktu_selesai }} </td>
            </tr>
            <tr>
              <th scope="col">No. Telepon</th>
              <td> {{ $reservasi->user->no_telp }} </td>
            </tr>
            <tr>
              <th scope="col">Status Pembayaran</th>
              <td> {{ $reservasi->status }} </td>
            </tr>
          </thead>
          <tbody>

          <tr>
          </tr>
          </tbody>
        </table>
        </div>

        <a href="/dashboard/bookings" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke Daftar Booking</a>
                <a href="/dashboard/bookings/{{ $reservasi->id }}/edit" class="btn btn-warning"><span data-feather="edit-3"></span> </a>
                <form action="/dashboard/bookings/{{ $reservasi->id }} " method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger " onclick="return confirm('Are you sure for delete data?')"><span data-feather="trash"></span></button>
                </form>
      </div>

@endsection