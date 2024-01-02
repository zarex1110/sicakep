@extends('layouts.main')

@section('container')

<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-2" src="/img/logo.png" alt="" width="150px">
    <div class="col-lg-6 mx-auto">
      <h2>S i C a k e p</h2>
      <p class="lead mb-3">Sistem Informasi <br>Catatan Keuangan Pribadi</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="/login"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">LOGIN</button></a>
      </div>
    </div>
  </div>

@endsection
