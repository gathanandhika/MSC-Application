@extends('dashboard.dash-layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Rekening</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/rekenings">
    @csrf

    <div class="form-group mb-3">
      <label for="nama_bank" class="form-label">Bank</label>
        <select name="nama_bank" class="form-control" required>
          <option value="">- Pilih Bank / Virtual Account -</option>
          <option value="BNI"> (BNI) Bank Negara Indonesia </option>
          <option value="BRI"> (BRI) Bank Republik Indonesia </option>
          <option value="BCA"> (BCA) Bank Central Asia </option>
          <option value="BJB"> (BJB) Bank Jabar Banten </option>
          <option value="OVO"> OVO </option>
          <option value="DANA"> DANA </option>
          <option value="GOPAY"> GOPAY </option>
        </select>
      @error('nama_bank')
        <div class="invalid-feedback"> {{ $message }} </div>
      @enderror
    </div>
    </div>

  <div class="mb-3">
    <label for="atas_nama" class="form-label">Nama (a/n)</label>
    <input type="text" class="form-control @error('atas_nama') is-invalid @enderror" id="atas_nama" name="atas_nama" required  value="{{ old('atas_nama') }}">
    @error('atas_nama')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="no_rekening" class="form-label">Nomor Rekening / Virtual Account</label>
    <input type="text" class="form-control  @error('no_rekening') is-invalid @enderror" id="no_rekening" name="no_rekening" required value="{{ old('no_rekening') }}">
    @error('no_rekening')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn btn-secondary mt-3">Submit</button>
  </div>

</div>

@endsection