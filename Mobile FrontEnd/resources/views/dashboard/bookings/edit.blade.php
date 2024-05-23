@extends('dashboard.dash-layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Edit Data Reservasi</h1>
</div>

<div class="table-responsive col-lg-12">
  <table class="table table-striped table-sm">
    <tbody>
      <tr>
      <form method="post" action="/dashboard/bookings/{{ $reservasi->id }}">
          @method('put')
          @csrf
            <div class="mb-3">
              <label for="nama_tim" class="form-label">Nama Tim</label>
              <input type="text" class="form-control  @error('nama_tim') is-invalid @enderror" id="nama_tim" name="nama_tim" required autofocus value="{{ old('nama_tim', $reservasi->nama_tim) }}">
              @error('nama_tim')
                <div class="invalid-feedback"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="id_lapangan" class="form-label">Lapangan</label>
              <select name="id_lapangan" class="form-control  @error('id_lapangan') is-invalid @enderror" id="id_lapangan" required>
              <option hidden value="{{ old('id_lapangan', $reservasi->id_lapangan) }}"> - Pilih Lapangan - </option>
                @foreach ($optionlapang as $item)
                 <option value="{{ $item->id }}" data-biaya="{{ $item->harga_sewa }}">{{ $item->nama_lapangan }}</option>
                @endforeach
                @error('id_lapangan')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
              </select>
            </div>
            <div class="form-group mt-2">
              <label for="tipe" class="form-label">Tipe</label>
              <select name="tipe" class="form-control @error('tipe') is-invalid @enderror" required value="{{ old('tipe', $reservasi->tipe) }}">
                 <option>Futsal</option>
                 <option>Volley</option>
              </select>
                @error('tipe')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="form-group mt-2">
              <label class="form-label"> Harga sewa/jam (Rp)</label>
              <input style="background-color:#f2f2f2;" type="text" class="form-control" readonly id="perjam">
            </div>
            <div class="form-group mt-3">
                <label for="tanggal" class="form-label">Tanggal</label>  
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" min="2022-12-01" max="" id="tanggal" name="tanggal" required value="{{ old('tanggal', $reservasi->tanggal) }}">
                @error('tanggal')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
              </div>
            <div class="row w-100 mt-3">
              <div class="col">
                <div class="form-group">  
                  <label for="waktu_mulai">Waktu Mulai:</label>
                  <input type="time" class="form-control  @error('waktu_mulai') is-invalid @enderror" name="waktu_mulai" id="waktu_mulai" min="08:00" max="24:00" step="3600" required value="{{ old('waktu_mulai', $reservasi->waktu_mulai) }}">
                  @error('waktu_mulai')
                    <div class="invalid-feedback"> {{ $message }} </div>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="waktu_selesai">Waktu Selesai:</label>
                  <input type="time" class="form-control  @error('waktu_selesai') is-invalid @enderror" name="waktu_selesai" id="waktu_selesai" min="08:00" max="24:00" step="3600" required value="{{ old('waktu_selesai', $reservasi->waktu_selesai) }}">
                  @error('waktu_selesai')
                    <div class="invalid-feedback"> {{ $message }} </div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group mt-2">
              <label for="biaya" class="form-label"> Total Biaya (Rp) </label>
              <input style="background-color:#f2f2f2;" type="text" class="form-control"  id="biaya" name="biaya" readonly value="{{ old('biaya', $reservasi->biaya) }}">
            </div>
              

            <div class="form-group mb-3">
            <label for="status" class="form-label">Status</label>
            <!-- <input type="text" class="form-control  @error('status') is-invalid @enderror" id="status" name="status" required autofocus value="{{ old('status', $reservasi->status) }}"> -->
            <select name="status" id="status" class="form-control" value="{{ old('status', $reservasi->status) }}">
              <option hidden value="{{ old('status', $reservasi->status) }}"> {{ $reservasi->status }} </option>
              <option value="Belum Bayar"> Belum Bayar </option>
              <option value="DP"> DP </option>
              <option value="Lunas"> Lunas </option>
            </select>
            @error('status')
              <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
          </div>
              
          <div class="mb-3">
            <a href="/dashboard/bookings" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke Daftar Reservasi</a>
            <button type="submit" class="btn btn btn-secondary" style="margin-left: 10px;">Submit</button>
          </div>

        </div>
        </form>
      </tr>
    </tbody>
  </table>
</div>    
            
  

<script>
  document.getElementById('id_lapangan').addEventListener('change', function() {
    var lapanganSelect = this;
    var biayaInput = document.getElementById('perjam');
    
    // Ambil biaya dari atribut data-biaya pada lapangan yang dipilih
    var selectedOption = lapanganSelect.options[lapanganSelect.selectedIndex];
    var biaya = selectedOption.getAttribute('data-biaya');
    
    // Setel nilai biaya pada input biaya
    biayaInput.value = biaya;
  });
</script>

<script>
  // Mendapatkan elemen-elemen yang diperlukan
  var waktuMulaiInput = document.getElementById('waktu_mulai');
  var waktuSelesaiInput = document.getElementById('waktu_selesai');
  var biayaInput = document.getElementById('biaya');
  var perJamInput = document.getElementById('perjam');

  // Event listener saat nilai waktu_mulai atau waktu_selesai berubah
  waktuMulaiInput.addEventListener('change', hitungBiaya);
  waktuSelesaiInput.addEventListener('change', hitungBiaya);

  // Fungsi untuk menghitung biaya berdasarkan waktu mulai dan selesai
  function hitungBiaya() {
    var waktuMulai = waktuMulaiInput.value;
    var waktuSelesai = waktuSelesaiInput.value;
    var perJam = perJamInput.value;

    if (waktuMulai && waktuSelesai && perJam) {
      var mulai = new Date('1970-01-01T' + waktuMulai + ':00');
      var selesai = new Date('1970-01-01T' + waktuSelesai + ':00');

      var durasi = (selesai - mulai) / 1000 / 3600; // Durasi dalam jam

      var biaya = Math.floor(durasi * perJam); // Menggunakan Math.floor() untuk membulatkan ke bawah
      biayaInput.value = biaya.toString(); // Mengatur nilai biaya sebagai string
    } else {
      biayaInput.value = ''; // Jika salah satu input kosong, kosongkan juga nilai biaya
    }
  }
</script>

@endsection