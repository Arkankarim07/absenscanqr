@extends('dashboard.layout.main')
@section('container')  
@auth 
<div class="mt-3 text-center">
  <h1><span class="rounded-border">Selamat datang {{ auth()->user()->name }}</span></h1>
  <p>jurusan : {{ auth()->user()->jurusan->nama_jurusan }}</p>
  {{ auth()->user()->role }}
</div>

<div class="text-center">

  @if (session()->has('gagal'))
  <div class="alert alert-warning alert-dismissible fade show col-md-3 mx-auto" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-md-3 mx-auto" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session()->has('delete'))
  <div class="alert alert-success alert-dismissible fade show col-md-3 mx-auto" role="alert">
    <strong>{{ session('delete') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
</div>

{{-- LOGIN GURU --}}
@if (auth()->user()->role == 'guru')
<div class="mt-3 shadow rounded w-25 mx-auto p-3">
  <video id="preview" class="w-100">
    <form action="{{ route('store') }}" method="POST" id="form">
      @csrf
      <input type="hidden" name="nis_id" id="nis_id">
      <input type="hidden" name="kelas_id" id="kelas_id">
      <input type="hidden" name="jurusan_id" id="jurusan_id">
    </form>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

      scanner.addListener('scan', function(c) {
  // Pisahkan nilai-nilai dari QR Code (misalnya, dengan memisahkan menggunakan koma)
  const values = c.split(',');

  // Atur nilai-nilai ke dalam elemen-elemen formulir sesuai dengan urutan
  document.getElementById('nis_id').value = values[0];
  document.getElementById('kelas_id').value = values[1];
  document.getElementById('jurusan_id').value = values[2];

  // Submit formulir
  document.getElementById('form').submit();
});

    </script>
  </video>
</div>
<p class="text-small text-center mt-3">Scan QR Untuk Absen</p>
@endif

{{-- LOGIN SISWA --}}
@if (auth()->user()->role == 'siswa')
    <div class="mt-3 shadow rounded w-25 mx-auto p-3 text-center mb-3  ">
      {{ $qrcode }}
    </div>
@endif


@if ($absens->isEmpty())
    <h3 class=" text-center mt-5">Silahkan Absen Dengan menggunakan QR Code</h3>
@else
{{-- <select name="kelas_id">
  <option value="">
    @foreach ($absens as $jurusan)
    <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan->nama_jurusan }}</option>
    @endforeach
  </option>
</select> --}}
<table class="table table-striped">
  <tr>
    <th scope="col">No</th>
    <th scope="col">Nama</th>
    <th scope="col">Kelas</th>
    <th scope="col">Jurusan</th>
    <th scope="col">Tanggal</th>
    <th scope="col">Action</th>
  </tr>
  <tr>
  @foreach ($absens as $absen)
      <td>{{ $loop->iteration }}</td>
      <td>{{ $absen->siswa->name }}</td>
      <td>{{ $absen->kelas->nama_kelas }}</td>
      <td>{{ $absen->jurusan->nama_jurusan }}</td>
      <td>{{ $absen->tanggal }}</td>
      <td>
        <form action="/absen{{ $absen->id }}" method="POST">
          @method('delete')
          @csrf
          <button class="badge bg-danger border-0 " onclick="return confirm('Yakin?')"><span class="bi" data-feather="x"></span></button>
        </form>
      </td>
    </tr>

    @endforeach
</table>
@endif

 
</div>


@endauth  

@guest

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <h1 class="fs-3 w-50 py-3">Silahkan Login terlebih dahulu untuk melihat halaman ini</h1>
</div>
@endguest

@endsection