{{-- {{ dd($expenses) }} --}}
@extends('dashboard.layouts.main')

@section('container')

<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

<div class="row">
    <div class="col-xl-6 col-xxl-5 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pengeluaran</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-3 mb-3"> Rp. {{ number_format($totalday, 2, '.', ',') }} </h3>
                            <div class="mb-0">
                                {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span> --}}
                                <span class="text-muted">Hari Ini</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Visitors</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">14.212</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pengeluaran</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-3 mb-3">Rp. {{ number_format($total, 2, '.', ',') }}</h3>
                            <div class="mb-0">
                                {{-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span> --}}
                                <span class="text-muted">Bulan Ini</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Transaksi</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $transaksi }}</h1>
                            <div class="mb-0">
                                {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span> --}}
                                <span class="text-muted">Jumlah Transaksi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Recent Movement</h5>
            </div>
            <div class="card-body py-3">
                <div class="chart chart-sm">
                    <canvas id="chartjs-dashboard-line"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi">
                <use xlink:href="#calendar3" /></svg>
            This week
        </button>
    </div>
</div>

<div>
    <h2>Dashboard</h2>
</div>

<div class="container-fluid">
    <div class="row gx-1">
        <div class="col md-4">
            <div class="card text-white bg-info mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">This Month </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Expenses</h6>
                    <p class="card-text">Rp. {{ number_format($expenses->sum('amount'), 2, '.', ',') }}</p>
                    <p class="card-text">{{ $expenses->count('amount') }}</p>
                </div>
            </div>
        </div>
        <div class="col md-4">
            <div class="card text-white bg-info mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">This Month </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Incomes</h6>
                    <p class="card-text">Rp. {{ number_format($expenses->sum('amount'), 2, '.', ',') }}</p>
                    <p class="card-text">{{ $expenses->count('amount') }}</p>
                </div>
            </div>
        </div>
        <div class="col md-4">
            <div class="card text-white bg-info mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">This Month </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Incomes</h6>
                    <p class="card-text">Rp. {{ number_format($expenses->sum('amount'), 2, '.', ',') }}</p>
                    <p class="card-text">{{ $expenses->count('amount') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<h2>Week Transaction</h2>
<h4></h4>

<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

@endsection
