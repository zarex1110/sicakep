@extends('layouts.main')

@section('container')
<div class="row justify-content-center align-items-center text-center">
    <div class="col-lg-4 justify-content-center">
        <div class="card-body text-center">
            <img src="img/zaky.png" alt="avatar"
              class="rounded-circle img-fluid shadow" style="width: 200px;">
        </div>
        <h2 class="fw-normal">{{ $name }}</h2>
        <p> {{ $email }} </p>
        <p><a class="btn btn-secondary" href="/profil">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
</div>

<div class="container marketing">
    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 my-auto">
            <h2 class="featurette-heading fw-normal lh-1">Hello, I'm an Traveller. <span
                    class="text-body-secondary"><br>But, I like make something in Tech</span></h2>
            <p class="lead mt-2">We live in world you'll never see on screen, Don't forget simle !</p>
        </div>
        <div class="col-md-5">
            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                src="img/{{ $image }}" width="500" height="500" role="img" aria-label="Placeholder: 500x500"
                preserveAspectRatio="xMidYMid slice" focusable="false">
        </div>
    </div>
    <hr class="featurette-divider">
</div>



@endsection
