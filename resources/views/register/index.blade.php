@extends('layout.index')

@section('container')
    <div class="container">
      <div class="row ">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
          <div class=" col-md-6 shadow p-3 rounded">
            <h1 class="fw-bold text-center text-danger">Register</h1>
            <form action="/regist" method="post">
              @csrf
              <div class="mb-2">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Masukkan Nama">
              </div>
              <div class="mb-2">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" aria-describedby="emailHelp" placeholder="Masukkan Nis">
              </div>
              <div class="mb-2">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" id="kelas" name="kelas" aria-label="Default select example">
                  <option selected>Kelas</option>
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan" aria-label="Default select example">
                  <option selected>Jurusan</option>
                  <option value="rekayasa perangkat lunak">Rekayasa Perangkat Lunak</option>
                  <option value="desain komunikasi visual">Desain Komunikasi Visual</option>
                  <option value="bisnis retail">Bisnis Retail</option>
                  <option value="manajemen perkantoran">Manajemen Perkantoran</option>
                  <option value="akuntansi">Akuntansi</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
              </div>
              <a href="/login">Sudah Punya akun? Login</a>
              <div class="mb-2 d-flex justify-content-end">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </form>            
          </div>
        </div>
      </div>
    </div>
@endsection
