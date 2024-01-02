@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Buat Transaksi Baru</h2>
</div>

<div class="col-lg-10">
    <form method="post" action="/dashboard/incomes" enctype="multipart/form-data">
        @csrf
        <button type="submit" class="btn btn-primary mb-4">Create</button>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title">Transaksi</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid
            @enderror" id="title" placeholder="Tuliskan Judul" required autofocus value="{{ old('title') }}">
                @error('title')
                {{ $message }}
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="date">Tanggal</label>
                <input type="date" name="date" id="date" class="form-control" value={{ old('amount') }} required>
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="amount">Nilai</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="number" name="amount" class="form-control @error('amount') is-invalid
                @enderror" id="amount" placeholder="10000" required value="{{ old('amount') }}">
                </div>
                @error('amount')
                {{ $message }}
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="type_id">Kategori</label>
                <select class="selectpicker form-select @error('type_id') is-invalid
            @enderror" name="type_id" id="type_id" required>

                    @foreach ($types as $type)
                    @if(old('type_id') === $type->id)
                    <option class="dropwon-item" value="{{ $type->id }}" selected>
                        {{ $type->name }}
                    </option>
                    @else
                    <option class="dropwon-item" value="{{ $type->id }}">
                        {{ $type->name }}
                    </option>
                    @endif
                    @endforeach
                    @error('type_id')
                    {{ $message }}
                    @enderror
                </select>
            </div>


        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="payment_id">Jenis Pembayaran</label>
                <select class="form-select @error('payment_id') is-invalid
                @enderror" name="payment_id" id="payment_id" required>

                    @foreach ($payments as $payment)
                    @if(old('payment_id') === $payment->id)
                    <option value="{{ $payment->id }}" selected>
                        {{ $payment->name }}
                    </option>
                    @else
                    <option value="{{ $payment->id }}">
                        {{ $payment->name }}
                    </option>
                    @endif
                    @endforeach
                    @error('payment_id')
                    {{ $message }}
                    @enderror
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="card_id"> Alat Pembayaran </label>
                <select class="form-select @error('card_id') is-invalid
            @enderror" name="card_id" id="card_id" required disabled>

                    @foreach ($cards as $card)
                    @if(old('card_id') === $card->id)
                    <option value="{{ $card->id }}" selected>
                        {{ $card->name }}
                    </option>
                    @else
                    <option value="{{ $card->id }}">
                        {{ $card->name }}
                    </option>
                    @endif
                    @endforeach
                    @error('card_id')
                    {{ $message }}
                    @enderror
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="invoice"> Invoice </label>
                <select class="form-select @error('invoice') is-invalid
                @enderror" name="invoice" id="invoice" required onchange="showDiv('image',this)">
                    @if(old('invoice') === 'Ya')
                    <option value="Ya" selected>
                        Ya
                    </option>
                    <option [ngValue]="Tidak">
                        Tidak
                    </option>
                    @else
                    <option [ngValue]="Ya">
                        Ya
                    </option>
                    <option [ngValue]="Tidak" selected>
                        Tidak
                    </option>
                    @endif
                    @error('invoice')
                    {{ $message }}
                    @enderror
                </select>
            </div>

            <div class="col-md-6 mb-3" id="image" style="display:none">
                <label class="custom-file-label" for="image">File Invoice</label>

                <input type="file" class="form-control @error('image') is-invalid
                @enderror" name="image" onchange="previewImage()">
                <img class="img-preview img-fluid mt-2 d-block" id="frame" style="max-height:300px; overflow:hidden;">

                @error('image')
                {{ $message }}
                @enderror
            </div>
        </div>
</div>

</form>
</div>

<script type="text/javascript">
    function previewImage() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 'Ya' ? 'block' : 'none';
    }

    document.getElementById("date").valueAsDate = new Date();

    let button = document.querySelector("#card_id");
        document.querySelector("#payment_id").addEventListener('change', function (e) {
        if (e.target.value === "1") {
            button.disabled = true;
            button.value = "1";
    }   else {
            button.disabled = false;
            button.value = "2";
            button.querySelector("option[value='1']").style.display = 'none';
    }
})


</script>

@endsection
