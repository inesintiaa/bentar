@extends('layouts.admin.app')

@section('title', 'Tambah Transaksi')

@section('content')
    <div class="d-flex flex-column gap-1">
        <div class="card">
            <div class="card-header">
                <h1 class="fs-4 text-center">
                    Form Tambah Data Transaksi
                </h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-primary alert-dismissible mx-4 mt-4 " role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <form class="mx-4" action="{{ route('admin.transaksi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="peserta_id" class="form-label">Peserta</label>
                        <select required id="peserta_id" name="peserta_id" class="form-select"
                            data-custom-message="Tolong pilih peserta.">
                            @foreach ($peserta as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tiket_id" class="form-label">Tiket</label>
                        <select required id="tiket_id" name="tiket_id" class="form-select"
                            data-custom-message="Tolong pilih tiket.">
                            @foreach ($tiket as $item)
                                <option data-price="{{ $item->price }}" value="{{ $item->id }}">
                                    {{ $item->konser->name }} - {{ $item->category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 w-25">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input min="1" max="10" id="quantity" name="quantity" type="number"
                            class="form-control" id="quantity" oninput="calculateSubTotal()"
                            data-custom-message="Tolong isi quantity." required>
                    </div>
                    <div class="mb-3 w-25">
                        <label for="sub_total" class="form-label">Total Bayar</label>
                        <input id="sub_total" name="sub_total" type="number" class="form-control" id="sub_total"
                            data-custom-message="Tolong isi sub total.">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.transaksi') }}">
                        <button type="button" class="btn btn-danger">Batal</button>

                    </a>
                </form>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/field-message.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tiketSelect = document.getElementById('tiket_id');
            const quantityInput = document.getElementById('quantity');

            calculateSubTotal();

            tiketSelect.addEventListener('change', calculateSubTotal);
            quantityInput.addEventListener('input', calculateSubTotal);
        });

        function calculateSubTotal() {
            const tiketSelect = document.getElementById('tiket_id');
            const selectedOption = tiketSelect.options[tiketSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            const quantity = document.getElementById('quantity').value;
            const subTotal = document.getElementById('sub_total');

            if (price && quantity) {
                subTotal.value = price * quantity;
            } else {
                subTotal.value = 0;
                subTotal.value = 0;
            }
        }
    </script>

@endsection
