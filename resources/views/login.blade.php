@extends('template')

@section('konten')
    <div class="container-fluid col-md-3">
        <div class="row mt-5">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Masuk Ke Sistem</p>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                            aria-describedby="helpid">
                        <small id="helpid" class="text-muted">Email</small>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password"
                            aria-describedby="helppass">
                        <small id="helppass" class="text-muted">password</small>
                    </div>
                    <button id="btn-login" class="btn btn-sm btn-primary float-end">login</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ url('/pages/login.js') }}"></script>
@endpush
