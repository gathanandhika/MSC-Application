@extends('dashboard.dash-layout.main')

@section('container')


<div class="table-responsive col-lg-12">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Lapangan</h1>
        </div>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nama Lapangan</th>
              <td> {{ $lapangan->nama_lapangan }} </td>
            </tr>
            <tr>
              <th scope="col">Detail</th>
              <td> {{ $lapangan->detail }} </td>
            </tr>
            <tr>
              <th scope="col">Harga/jam</th>
              <td> {{ $lapangan->harga_sewa }} </td>
            </tr>
          </thead>
          <tbody>

          <tr>
          </tr>
          </tbody>
        </table>
        </div>

        <a href="/dashboard/lapangans" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke Daftar lapangans</a>
                <a href="/dashboard/lapangans/{{ $lapangan->id }}/edit" class="btn btn-warning"><span data-feather="edit-3"></span></a>
                <form action="/dashboard/lapangans/{{ $lapangan->id }} " method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger " onclick="return confirm('Are you sure for delete data?')"><span data-feather="trash"></span></button>
                </form>
      </div>

@endsection