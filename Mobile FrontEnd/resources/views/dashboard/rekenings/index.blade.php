@extends('dashboard.dash-layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Rekening</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success " role="alert">
  {{ session ('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
  <a href="/dashboard/rekenings/create" class="btn btn btn-success mb-3">Tambah Rekening</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">No. Rekening</th>
              <th scope="col">Nama (a/n)</th>
              <th scope="col">Via</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($rekenings as $rekening)
          <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $rekening->no_rekening }} </td>
              <td> {{ $rekening->atas_nama }} </td>
              <td> {{ $rekening->nama_bank }} </td>
              <td>
                <!-- <a href="/dashboard/rekenings/{{ $rekening->id }} " class="badge bg-success"><span data-feather="eye"></span> Show</a> -->
                <a href="/dashboard/rekenings/{{ $rekening->id }}/edit" class="badge bg-warning link-no-decoration"><span data-feather="edit-3"></span> Edit</a>
                <form action="/dashboard/rekenings/{{ $rekening->id }} " method="post" class="d-inline">
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