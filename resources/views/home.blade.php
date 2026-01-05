@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inventories') }}</div>

                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <h4 class="mb-3">Selamat Datang. {{ Auth::user()->name }}! 👋</h4>
                    <p class="card-text">Anda berhasil masuk ke dalam sistem.</p>

                    <hr class="my-4">

                    
                    <div class="d-grid gap-2">
                        
                        <a href="{{ route('inventories.index') }}" class="btn btn-primary btn-lg">
                            📂 Buka Dashboard Inventaris
                        </a>

                       
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                                🏠 Kembali ke Halaman Depan
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection