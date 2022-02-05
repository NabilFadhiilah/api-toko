@extends('template')

@section('konten')
    @include('modalorder')
    <table class="table table-border table-stripped">
        <thead>
            <tr>
                <th>NO</th>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Customer</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection

@push('scripts')
    <script src="{{ url('/pages/listorder.js') }}"></script>
@endpush
