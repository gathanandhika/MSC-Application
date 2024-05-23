@extends ('dashboard.dash-layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Laporan</h1>
</div>

<div class="d-flex justify-content-end">
    <h6>Bulan/</h6>
    <h6>Tahun</h6>
</div>

<div class="d-flex justify-content-end">
<select id="bulanFilter" class="form-select me-2" >
  <option value="">Semua</option>
  <option value="01">Januari</option>
  <option value="02">Februari</option>
  <option value="03">Maret</option>
  <option value="04">April</option>
  <option value="05">Mei</option>
  <option value="06">Juni</option>
  <option value="07">Juli</option>
  <option value="08">Agustus</option>
  <option value="09">September</option>
  <option value="10">Oktober</option>
  <option value="11">November</option>
  <option value="12">Desember</option>
</select>

<select id="tahunFilter" class="form-select me-2">
  <option value="">Semua</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  <option value="2026">2026</option>
  <option value="2027">2027</option>
  <option value="2028">2028</option>
  <option value="2029">2029</option>
  <option value="2030">2030</option>
  <option value="2031">2031</option>
  <option value="2032">2032</option>
  <option value="2033">2033</option>
</select>

<button class="btn btn-success" onclick="filterData()"><span data-feather="search" class="align-text-bottom" style="color: white; margin-bottom: 20%;"></span></button>
</div>

<br>

<div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tim</th>
              <th scope="col">User </th>
              <th scope="col">Waktu Mulai</th>
              <th scope="col">Waktu Selesai</th>
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
              <td> {{ $reservasi->user->name }} </td>
              <td> {{ $reservasi->waktu_mulai}} </td>
              <td> {{ $reservasi->waktu_selesai}} </td>
              <td> {{ $reservasi->tanggal }} </td>
              <td> Rp. {{ number_format($reservasi->biaya, 0, ',', '.') }} </td>
              <td> {{ $reservasi->status }} </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>

      <button class="badge bg-dark border-0" style="width: 200px; height: 30px; margin-left: 84%;" onclick="return window.print()"><span data-feather="printer"></span> Print</button>


      <script>
        function filterData() {
  var bulan = document.getElementById('bulanFilter').value;
  var tahun = document.getElementById('tahunFilter').value;
  
  var rows = document.querySelectorAll('tbody tr');
  
  for (var i = 0; i < rows.length; i++) {
    var tanggal = rows[i].querySelector('td:nth-child(6)').textContent;
    var tgl = new Date(tanggal);
    
    var rowVisible = true;
    
    if (bulan !== '' && tgl.getMonth() + 1 !== parseInt(bulan)) {
      rowVisible = false;
    }
    
    if (tahun !== '' && tgl.getFullYear() !== parseInt(tahun)) {
      rowVisible = false;
    }
    
    rows[i].style.display = rowVisible ? 'table-row' : 'none';
  }
}
      </script>

      <script>
        window.addEventListener('DOMContentLoaded', function() {
        filterData();
        });

      </script>
@endsection
