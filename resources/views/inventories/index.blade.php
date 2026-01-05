<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris TUKL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 15px;
        }
        .table img {
            object-fit: cover;
            border-radius: 8px;
        }
        .btn {
            border-radius: 8px;
            font-weight: 500;
        }
        .table th {
            background-color: #f8f9fa;
            border-top: none;
            font-weight: 600;
            color: #495057;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4 text-primary">Situs Inventaris TUKL</h3>
                    <h5 class="text-center text-muted mb-4">Hanya untuk internal IT</h5>
                    <hr class="mb-4">
                </div>

                <ul class="nav justify-content-end mb-3">
                    <li class="nav-item">
                        <a class="nav-link text-danger fw-bold" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Log Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>

                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        
                        
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <a href="{{ route('inventories.create') }}" class="btn btn-md btn-success me-2">
                                    <i class="bi bi-plus-circle"></i> Tambah Inventaris
                                </a>
                                <a href="{{ route('inventories.exportPdf') }}" target="_blank" class="btn btn-md btn-danger">
                                    📄 Export PDF
                                </a>
                            </div>
                        </div>
                        

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center" style="width: 120px;">Gambar</th>
                                        <th scope="col">Kode Item</th>
                                        <th scope="col">Nama Item</th>
                                        <th scope="col">People in Charge</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Penjelasan</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        <th scope="col" class="text-center" style="width: 20%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($inventories as $inventory)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ asset('/storage/inventories/'.$inventory->image) }}" 
                                                     class="rounded" 
                                                     style="width: 100px; height: 80px; object-fit: cover;" 
                                                     alt="Gambar {{ $inventory->item_name }}">
                                            </td>
                                            <td>{{ $inventory->item_code }}</td>
                                            <td>{{ $inventory->item_name }}</td>
                                            <td>{{ $inventory->pic }}</td>
                                            <td>{{ $inventory->location }}</td>
                                            <td>{{ Str::limit($inventory->description, 50) }}</td>
                                            <td class="text-success fw-bold">{{ "Rp " . number_format($inventory->price, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                <span class="badge bg-primary">{{ $inventory->stock }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <a href="{{ route('inventories.show', $inventory->id) }}" 
                                                       class="btn btn-sm btn-outline-info" 
                                                       title="Lihat Detail">
                                                        👁️ Lihat
                                                    </a>
                                                    <a href="{{ route('inventories.edit', $inventory->id) }}" 
                                                       class="btn btn-sm btn-outline-warning" 
                                                       title="Edit">
                                                        ✏️ Ubah
                                                    </a>
                                                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');" 
                                                          action="{{ route('inventories.destroy', $inventory->id) }}" 
                                                          method="POST" 
                                                          class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger" 
                                                                title="Hapus">
                                                            🗑️ Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <div class="alert alert-info m-0">
                                                    Data Inventaris belum ada. 
                                                    <a href="{{ route('inventories.create') }}" class="alert-link">Tambah inventaris pertama</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        @if($inventories->hasPages())
                            <div class="d-flex justify-content-center mt-3">
                                {{ $inventories->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>
</html>