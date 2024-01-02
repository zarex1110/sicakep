@extends('layouts.main')

@section('container')
    <h2>{{ $transaction->title }}</h2>
    <h5>{{ $transaction->amount }}</h5>
    <p>{{ $transaction->type }}</p>
    <p>{{ $transaction->payment }}</p>
    <a href="/finnanceapp">Back to Transaction</a>
@endsection
