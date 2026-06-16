<!DOCTYPE html>
<html>
<head>
    <title>Barang Tersedia</title>
</head>
<body>

<h1>Barang Tersedia</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Nama Barang</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($items as $item)
    <tr>
        <td>{{ $item->item_name }}</td>
        <td>{{ $item->status }}</td>

        <td>
            <form action="{{ route('claim.store') }}" method="POST">
                @csrf

                <input type="hidden" name="found_item_id" value="{{ $item->id }}">

                <input type="text" name="nim" placeholder="NIM" required>
                <br><br>

                <input type="text" name="phone" placeholder="No HP" required>
                <br><br>

                <textarea name="notes" placeholder="Alasan barang milik anda"></textarea>
                <br><br>

                <button type="submit">
                    Klaim Barang
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
