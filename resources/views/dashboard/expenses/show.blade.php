@extends('dashboard.layouts.main')

@section('container')

<div class="text-justify-content-end">
    <a href="/dashboard/expenses/{{ $expenses->id }}" class="badge bg-info">
        <svg class="bi">
            <use xlink:href="#eye-fill" /></svg>
    </a>
    <a href="/dashboard/expenses/{{ $expenses->id }}" class="badge bg-warning">
        <svg class="bi">
            <use xlink:href="#pencil-square" /></svg>
    </a>
    <a href="/dashboard/expenses/{{ $expenses->id }}" class="badge bg-danger">
        <svg class="bi">
            <use xlink:href="#x-circle" /></svg>
    </a>
</div>

<h1>{{ $expenses -> title }}</h1>
<h2>{{ $expenses -> amount }}</h2>
<h2>{{ $expenses -> card }}</h2>
<h2>{{ $expenses -> type -> name }}</h2>

<div style="max-width: 350px; overflow:hidden">
    <img src="{{ asset('storage/' . $expenses->image) }}" alt="Inovice" class="img-fluid mt-3">
</div>

@endsection
