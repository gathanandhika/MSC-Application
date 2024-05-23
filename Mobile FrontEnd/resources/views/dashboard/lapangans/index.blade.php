@extends('dashboard.dash-layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Lapangan</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success " role="alert">
  {{ session ('success') }}
</div>
@endif


<div class="table-responsive">
  <a href="/dashboard/lapangans/create" class="btn btn btn-success mb-3">Tambah data lapangan</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Lapangan</th>
              <th scope="col">Harga</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($lapangans as $lapangan)
          <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $lapangan->nama_lapangan }} </td>
              <td> Rp. {{ $lapangan->harga_sewa }} </td>
              <td>
                <a href="/dashboard/lapangans/{{ $lapangan->id }} " class="badge bg-success link-no-decoration"><span data-feather="eye"></span> Show</a>
                <a href="/dashboard/lapangans/{{ $lapangan->id }}/edit" class="badge bg-warning link-no-decoration"><span data-feather="edit-3"></span> Edit</a>
                <form action="/dashboard/lapangans/{{ $lapangan->id }} " method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0 link-no-decoration"
                   onclick="return confirm('Are you sure for delete data?')"><span data-feather="trash"></span> Delete</button>
                </form>
              </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>
@endsection