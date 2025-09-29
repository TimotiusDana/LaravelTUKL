<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Detail Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('inventories.update', $inventories->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Gambar</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk image -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kode Item</label>
                                <input type="text" class="form-control @error('item_code') is-invalid @enderror" name="item_code" value="{{ old('item_code', $inventories->item_code) }}" placeholder="Ubah Kode Item">
                            
                                <!-- error message untuk title -->
                                @error('item_code')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Item</label>
                                <input type="text" class="form-control @error('item_name') is-invalid @enderror" name="item_name" value="{{ old('item_name', $inventories->item_name) }}" placeholder="Ubah Nama Item">
                            
                                <!-- error message untuk title -->
                                @error('item_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <div class="form-group mb-3">
                                <label class="font-weight-bold">People in Charge</label>
                                <input type="text" class="form-control @error('pic') is-invalid @enderror" name="pic" value="{{ old('pic', $inventories->pic) }}" placeholder="Ubah Penanggungjawab">
                            
                                <!-- error message untuk title -->
                                @error('pic')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <div class="form-group mb-3">
                                <label class="font-weight-bold">Lokasi</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $inventories->location) }}" placeholder="Ubah Lokasi">
                            
                                <!-- error message untuk title -->
                                @error('location')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukkan Deskripsi Inventaris">{{ old('description', $inventories->description) }}</textarea>
                            
                                <!-- error message untuk description -->
                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Harga</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $inventories->price) }}" placeholder="Ubah Harga Inventaris">
                                    
                                        <!-- error message untuk price -->
                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Jumlah Barang</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $inventories->stock) }}" placeholder="Ubah Stok Inventaris">
                                    
                                        <!-- error message untuk stock -->
                                        @error('stock')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="button" class="btn btn-md btn-info me-3" onclick="window.location='{{ route('inventories.show', $inventories->id) }}'">Detail Lama</button>
                             <button type="button" class="btn btn-md btn-primary me-3" onclick="window.location='{{ route('inventories.index') }}'">Kembali</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
</body>
</html>