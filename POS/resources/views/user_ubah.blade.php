<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form Ubah Data User</h1>
    <a href="/user">Kembali</a>
    <br><br>

    <form method="post" action="{{ url('user/ubah_simpan/'. $data->user_id) }}}}">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label>Username</label>
        <input type="text" name="username" placeholder="Masukan Username" value="{{ $data->username }}">
        <br>

        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukan Nama" value="{{ $data->nama }}">
        <br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukan Password" value="{{ $data->password }}">
        <br>

        <select name="level_id">
            <option value="{{ $data->level_id }}">{{ $data->level->level_nama }}</option>
            @foreach($levels as $level)
                <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
            @endforeach
        </select>
        <br><br>

        <input type="submit" class="btn btn-success" value="Ubah">
    </form>
</body>

</html>
