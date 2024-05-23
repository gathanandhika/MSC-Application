@extends('dashboard.dash-layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Booking</h1>
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
        <form method="post" action="/dashboard/bookings">
          @csrf
            <div class="mb-3">
              <label for="nama_tim" class="form-label">Nama Tim</label>
              <input type="text" class="form-control  @error('nama_tim') is-invalid @enderror" id="nama_tim" name="nama_tim" required autofocus value="{{ old('nama_tim') }}">
              @error('nama_tim')
                <div class="invalid-feedback"> {{ $message }} </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="id_lapangan" class="form-label">Lapangan</label>
              <select name="id_lapangan" class="form-control  @error('id_lapangan') is-invalid @enderror" id="id_lapangan" required value="{{ old('id_lapangan') }}">
                <option hidden value="">- Pilih Lapangan -</option>
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
              <select name="tipe" class="form-control @error('tipe') is-invalid @enderror" required value="{{ old('tipe') }}">
                <option hidden value="">- Pilih Tipe -</option>
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
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" min="2022-12-01" max="" id="tanggal" name="tanggal" required value="{{ old('tanggal') }}">
                @error('tanggal')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
              </div>
            <div class="row w-100 mt-3">
              <div class="col">
                <div class="form-group">  
                  <label for="waktu_mulai">Waktu Mulai:</label>
                  <input type="time" class="form-control  @error('waktu_mulai') is-invalid @enderror" name="waktu_mulai" id="waktu_mulai" min="08:00" max="24:00" step="3600" required>
                  @error('waktu_mulai')
                    <div class="invalid-feedback"> {{ $message }} </div>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="waktu_selesai">Waktu Selesai:</label>
                  <input type="time" class="form-control  @error('waktu_selesai') is-invalid @enderror" name="waktu_selesai" id="waktu_selesai" min="08:00" max="24:00" step="3600" required>
                  @error('waktu_selesai')
                    <div class="invalid-feedback"> {{ $message }} </div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group mt-2">
              <label for="biaya" class="form-label"> Total Biaya (Rp) </label>
              <input style="background-color:#f2f2f2;" type="text" class="form-control"  id="biaya" name="biaya" readonly>
            </div>

            <div class="mb-3 mt-3">
              <button type="submit" class="btn btn btn-success mt-1 "> Tambah Reservasi</button>
            </div>
              
        </form>
      </tr>
    </tbody>
  </table>
</div>

<div class="table-responsive col-lg-12">
<div class="d-flex align-items-center mb-1 ">
    <h5 class="mr-2">Daftar Reservasi</h5>
    <input type="date" id="tanggalFilter" class="form-control" style="margin-left: auto; width: 20%; margin-bottom: 20px;">
</div>

    <table id="reservasiTable" class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Tim</th>
                <th scope="col">Customer </th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col">Biaya</th>
                <th scope="col" class="bordered-th">Status Pembayaran</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasis as $reservasi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $reservasi->nama_tim }}</td>
                <td>{{ $reservasi->user->username }}</td>
                <td>{{ $reservasi->tanggal }}</td>
                <td>{{ $reservasi->waktu_mulai }}</td>
                <td>{{ $reservasi->waktu_selesai }}</td>
                <td>Rp. {{ number_format($reservasi->biaya, 0, ',', '.') }}</td>
                <td class="bordered-th">
                    @if($reservasi->status == 'Lunas')
                    <span class="badge bg-success">Lunas</span>
                    @elseif($reservasi->status == 'DP')
                    <span class="badge bg-warning">DP</span>
                    @elseif($reservasi->status == 'Belum Bayar')
                    <span class="badge bg-danger">Belum Bayar</span>
                    @endif
                </td>
                <td>
                    <a href="/dashboard/bookings/{{ $reservasi->id }}" class="badge bg-success link-no-decoration"><span
                            data-feather="eye"></span> Show</a>
                    <a href="/dashboard/bookings/{{ $reservasi->id }}/edit" class="badge bg-warning link-no-decoration"><span
                            data-feather="edit-3"></span> Edit</a>
                    <form action="/dashboard/bookings/{{ $reservasi->id }}" method="post" class="d-inline">
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

      <br><br><br>

      <script>
        document.getElementById('id_lapangan').addEventListener('change', function() {
          var id_lapanganSelect = this;
          var biayaInput = document.getElementById('perjam');
          
          // Ambil biaya dari atribut data-biaya pada id_lapangan yang dipilih
          var selectedOption = id_lapanganSelect.options[id_lapanganSelect.selectedIndex];
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

      <script>
          // Memfilter dan memperbarui tampilan tabel berdasarkan tanggal yang dipilih
          document.getElementById('tanggalFilter').addEventListener('change', function () {
              var tanggal = this.value;
              var rows = document.getElementById('reservasiTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
              for (var i = 0; i < rows.length; i++) {
                  var row = rows[i];
                  var tanggalCell = row.getElementsByTagName('td')[3];
                  if (tanggalCell.textContent.trim() === tanggal) {
                      row.style.display = '';
                  } else {
                      row.style.display = 'none';
                  }
              }
          });
      </script>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        // Ambil semua baris data pada tabel
        var rows = document.getElementById('reservasiTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        
        // Konversi daftar baris menjadi array agar dapat diurutkan
        var rowsArray = Array.from(rows);
        
        // Urutkan array berdasarkan kolom waktu mulai
        rowsArray.sort(function(a, b) {
            var waktuMulaiA = a.getElementsByTagName('td')[4].textContent.trim();
            var waktuMulaiB = b.getElementsByTagName('td')[4].textContent.trim();
            
            return waktuMulaiA.localeCompare(waktuMulaiB);
        });
        
        // Kosongkan tbody tabel
        var tbody = document.getElementById('reservasiTable').getElementsByTagName('tbody')[0];
        tbody.innerHTML = '';
        
        // Tambahkan kembali baris-baris data yang sudah diurutkan
        rowsArray.forEach(function(row) {
            tbody.appendChild(row);
        });
    });
</script>

      

@endsection