<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampilkan Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/inventories/'.$inventories->image) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <p>{{ $inventories->item_code }}</p>
                        <h3>{{ $inventories->item_name }}</h3>
                        <hr/>
                        <p>People in Charge : {{ $inventories->pic }}</p>
                        <p>Lokasi : {{ $inventories->location }}</p>
                        <p>{{ "Rp " . number_format($inventories->price,2,',','.') }}</p>
                        <p>Stock : {{ $inventories->stock }}</p>
                        <hr/>
                        <p>{!! $inventories->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>