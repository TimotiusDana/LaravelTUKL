<!DOCTYPE html>
<html>
<head>
    <title>Laporan Inventaris TUKL</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
        .center { text-align: center; }
    </style>
</head>
<body>

    <h2>Laporan Data Inventaris TUKL</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">Kode Item</th>
                <th style="width: 30%">Nama Item</th>
                <th style="width: 20%">People in Charge</th>
                <th style="width: 20%">Lokasi</th>
                <th style="width: 10%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $index => $item)
            <tr>
                <td class="center">{{ $index + 1 }}</td>
 
                <td>{{ $item->item_code }}</td> 
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->pic }}</td>
                <td>{{ $item->location }}</td>
                <td class="center">{{ $item->stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>