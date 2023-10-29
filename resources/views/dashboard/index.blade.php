@extends('dashboard.layout.main')
@section('container')
<div class="mt-3 text-center">

  
@auth 
<h1><span class="rounded-border">Selamat datang {{ auth()->user()->name }}</span></h1>
<p>jurusan : {{ auth()->user()->jurusan->jurusan }}</p>
<div class="mt-3 shadow rounded mx-auto w-25 p-3">
  {{ $qr }}
</div>
<p class=" text-small mt-3">Scan QR Untuk Absen</p>
</div>
<hr>
@endauth  

@guest
    
<h1 class=" fs-3 w-50 py-3 mx-auto">Silahkan Login terlebih dahulu untuk melihat halaman ini</h1>
@endguest

@endsection
