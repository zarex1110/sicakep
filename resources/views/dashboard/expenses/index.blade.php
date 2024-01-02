@extends('dashboard.layouts.main')

{{-- {{ dd($expenses) }} --}}

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Pengeluaran</h2>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div>
    <a href="/dashboard/expenses/create" class="btn btn-primary mb-3">Create New</a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Riwayat Pengeluaran</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Transaksi</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Jenis Pembayaran</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $expenses as $expense )
                <tr>
                    <th class="text-center" scope="row"></th>
                    <td class="align-left">{{ $expense->title }}</td>
                    <td class="text-end">Rp. {{ number_format($expense->amount, 2, '.', ',') }} </td>
                    <td class="text-center">{{ $expense->type->name }}</td>
                    <td class="text-center">{{ $expense->payment->name }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($expense->date)->format('m/d/Y') }} </td>
                    <td class="text-center">
                        <a href="/dashboard/expenses/{{ $expense->id }}" class="btn btn-info btn-sm">
                            <i class="align-middle" data-feather="eye"></i>
                        </a>
                        <a href="/dashboard/expenses/{{ $expense->id }}/edit" class="btn btn-warning btn-sm">
                            <i class="align-middle" data-feather="edit"></i>
                        </a>
                        <form action="/dashboard/expenses/{{ $expense->id }}" method="post" class='d-inline'>
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="align-middle" data-feather="delete"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Transaksi</th>
                    <th>Nilai</th>
                    <th>Kategori</th>
                    <th>Jenis Pembayaran</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<script>
    const table = new DataTable('#example',
    {
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            order: [[5, 'desc']],
            columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: [0,6]
            },
            {
                targets: 6,
                width: 120
            },
            {
                targets: 2,
                width: 100
            },
            ],
            stateSave: true
    }
    );

    table
    .on('order.dt search.dt', function () {
        let i = 1;

        table
            .cells(null, 0, { search: 'applied', order: 'applied' })
            .every(function (cell) {
                this.data(i++);
            });
    })
    .draw();

    accounting.formatMoney(5318008);

</script>

@endsection
