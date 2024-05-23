@extends('dashboard.dash-layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Reservasi</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success " role="alert">
  {{ session ('success') }}
</div>
@endif


<div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
          <tbody>
          <tr>
            <form method="post" action="/dashboard/reservasis">
            @csrf
            <div class="mb-3">
              <label for="nama_tim" class="form-label">Nama Tim</label>
              <input type="text" class="form-control  @error('nama_tim') is-invalid @enderror" id="nama_tim" name="nama_tim" required autofocus value="{{ old('nama_tim') }}">
              @error('nama_tim')
                <div class="invalid-feedback"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="id_user" class="form-label">Siswa</label>
              <select name="id_user" class="form-control @error('id_user') is-invalid @enderror">
                <option value="">- Pilih Siswa -</option>
                @foreach ($siswas as $item)
                  <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                @endforeach
              </select>
              @error('id_user')
                <div class="invalid-feedback"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group mb-3" style="margin-top: -20px;">
              <label for="biaya" class="form-label"></label>
              <input style="background-color:#dbd9d9;" type="text" class="form-control"  id="biaya" name="biaya" value="{{ $item->harga_lapangan }}" readonly>
            </div>
            <div style="margin-bottom: -20px;">
            <label for="tanggal" class="form-label">Jadwal</label>  
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" min="2022-12-01" max="" id="tanggal" name="tanggal" required>
              @error('tanggal')
                <div class="invalid-feedback"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="id_jadwal" class="form-label"></label>
              <select name="id_jadwal" class="form-control @error('id_jadwal') is-invalid @enderror" required>
                <option value="">- Pilih Jadwal -</option>
                @foreach ($optionjadwal as $jadwal)
                  <option value="{{ $item->id }}"> {{ $jadwal->jam }} </option>
                @endforeach
              </select>
              @error('id_jadwal')
                <div class="invalid-feedback"> {{ $message }} </div>
              @enderror
            </div>        
          </tbody>
        </table>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn btn-secondary mt-1 "> <span data-feather="plus-circle"></span> Tambah Reservasi</button>
      </div>
  </form>

  <div class="table-responsive col-lg-12">
  <h5>Daftar Reservasi</h5>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tim</th>
              <th scope="col">Customer </th>
              <th scope="col">Jam</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Biaya</th>
              <th scope="col">Status Pembayaran</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($reservasis as $reservasi)
          <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $reservasi->nama_tim }} </td>
              <td> {{ $reservasi->user->username }} </td>
              <td> {{ $reservasi->jadwal->jam }} </td>
              <td> {{ $reservasi->tanggal }} </td>
              <td> {{ $reservasi->lapangan->harga_lapangan }} </td>
              <td> {{ $reservasi->status }} </td>
              <td>
                <a href="/dashboard/reservasis/{{ $reservasi->id }}" class="badge bg-success"><span data-feather="eye"></span> Show</a>
                <a href="/dashboard/reservasis/{{ $reservasi->id }}/edit" class="badge bg-warning"><span data-feather="edit-3"></span> Edit</a>
                <form action="/dashboard/reservasis/{{ $reservasi->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure for delete data?')"><span data-feather="trash"></span> Delete</button>
                </form>
              </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>

@endsection