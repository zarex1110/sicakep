@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>

            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" name='name' class="form-control @error('name') is-invalid @enderror"
                        id="floatingInput" placeholder="John Doe" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                    <div class=invalid-feedback>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="text" name='username' class="form-control mt-2 @error('username') is-invalid @enderror"
                        id="floatingInput" placeholder="johndoe" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class=invalid-feedback>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control mt-2 @error('email') is-invalid @enderror"
                        id="floatingInput" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                    <div class=invalid-feedback>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control mt-2 @error('password') is-invalid @enderror"
                        id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class=invalid-feedback>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>

            </form>
            <small class='d-block text-center mt-2'>Already registered? <a href="/login">Login!</a></small>
        </main>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</div>

@endsection
