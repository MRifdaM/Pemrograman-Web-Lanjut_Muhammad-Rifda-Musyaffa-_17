<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            {{-- --------------------------------Jobsheet 3------------------------------------ --}}
            {{-- <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th> --}}

            {{-- --------------------------------Jobsheet 4----------------------------------- --}}
            {{-- -------------------------------Praktikum 2.3-------------------------------------- --}}
            <th>Jumlah Pengguna</th>
        </tr>
        {{-- -----------------------------------Jobsheet 3-------------------------------------------- --}}
        {{-- Menampilkan array asoc dengan lebih dari 1 data  --}}
        {{-- @foreach ($data as $d)
        <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->level_id }}</td>
        </tr>
        @endforeach --}}

        {{-- -----------------------------------Jobsheet 4-------------------------------------------- --}}
        {{-- ---------------------------------Praktikum 2.1-------------------------------------------- --}}
        {{-- Menampilkan array asoc dengan 1 data  --}}
        {{-- <td>{{ $data->user_id }}</td>
        <td>{{ $data->username }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->level_id }}</td> --}}

        {{-- --------------------------------Praktikum 2.3------------------------------------------ --}}
        <td>{{ $data }}</td>
    </table>
</body>
</html>
