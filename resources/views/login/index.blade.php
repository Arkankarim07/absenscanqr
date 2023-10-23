@extends('layout.index')

@section('container')
    <div class="container">
      <div class="row ">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
          <div class=" col-md-6 shadow p-3 rounded">
            <h1 class="fw-bold text-center text-danger">Login</h1>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
              <form action="/login" method="POST">
                @csrf
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama" name="name">

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                 @enderror
              </div>

              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Masukkan Password" name="password">

                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                 @enderror
              </div>

              <a href="/regist">Belum Punya akun? Register</a>

              <div class=" mb-2 d-flex justify-content-end">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
