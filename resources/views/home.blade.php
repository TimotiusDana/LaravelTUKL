@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inventories') }}</div>

                {{-- Awal Bagian yang Diedit --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Sapaan Personal --}}
                    <h4 class="mb-3">Halo, {{ Auth::user()->name }}! 👋</h4>
                    <p class="card-text">Anda berhasil login ke dalam sistem.</p>

                    <hr class="my-4">

                    {{-- Tombol Navigasi --}}
                    <div class="d-grid gap-2">
                        {{-- Tombol Besar ke Inventaris --}}
                        <a href="{{ route('inventories.index') }}" class="btn btn-primary btn-lg">
                            📂 Buka Dashboard Inventaris
                        </a>

                        {{-- Tombol Kecil Kembali ke Depan --}}
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                                🏠 Kembali ke Halaman Depan
                            </a>
                        </div>
                    </div>
                </div>
                {{-- Akhir Bagian yang Diedit --}}
            </div>
        </div>
    </div>
</div>
@endsection