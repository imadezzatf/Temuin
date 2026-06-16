<!DOCTYPE html>
<html>
<head>
    <title>Barang Sudah Diambil</title>
</head>
<body>

<h1>Barang Sudah Diambil</h1>

<table border="1" cellpadding="10">

<tr>
    <th>Nama Barang</th>
    <th>Status</th>
</tr>

@foreach($items as $item)
<tr>
    <td>{{ $item->item_name }}</td>
    <td>{{ $item->status }}</td>
</tr>
@endforeach

</table>

</body>
</html>