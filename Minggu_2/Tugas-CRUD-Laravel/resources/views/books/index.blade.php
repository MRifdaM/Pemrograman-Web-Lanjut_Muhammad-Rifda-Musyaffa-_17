<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>
    <h1>List Book</h1>
    {{-- Menampilkan pesan sukses dari session --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Tautan untuk menuju halaman pembuatan buku baru --}}
    <a href="{{ route('books.create') }}">Add Book</a>

    {{-- Tabel untuk menampilkan daftar buku --}}
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Looping untuk menampilkan setiap data buku yang diteruskan dari controller --}}
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td> {{-- Menampilkan judul buku --}}
                <td>{{ $book->author }}</td> {{-- Menampilkan penulis buku --}}
                <td>{{ $book->stock }}</td> {{-- Menampilkan stok buku --}}
                <td>
                    {{-- Tautan untuk melihat detail buku --}}
                    <a href="{{ route('books.show', $book->id) }}">Lihat</a>
                    {{-- Tautan untuk mengedit buku --}}
                    <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                    {{-- Form untuk menghapus buku --}}
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf {{-- Token CSRF untuk keamanan form --}}
                        @method('DELETE') {{-- Mengubah metode HTTP menjadi DELETE --}}
                        <button type="submit" onclick="return confirm('Yakin hapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
