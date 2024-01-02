@extends('layouts.main')

@section('container')

<div class="row justify-content-center align-items-center">
    <div class="col-lg-4">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show text-justify-center" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show text-justify-center" role="alert">
            {{ session('loginError') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>

            <form action="/login" method="post">
                @csrf
                <div class="form-floating mt-2">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com"
                        autofocus required value="{{ old("email") }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mt-2">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        required>
                    <label for="password">Password</label>
                </div>

                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Login</button>

            </form>

            <small class='d-block text-center mt-2'>Not registered? <a href="/register">Register Now!</a></small>
        </main>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</div>

@endsection
