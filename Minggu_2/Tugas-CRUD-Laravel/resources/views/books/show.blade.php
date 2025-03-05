<!DOCTYPE html>
<html>
<head>
    <title>Detail Book</title>
</head>
<body>
    <h1>Book Details</h1>
    {{-- Menampilkan detail buku secara lengkap --}}
    <p><strong>Title:</strong> {{ $book->title }}</p> {{-- Menampilkan judul buku --}}
    <p><strong>Author:</strong> {{ $book->author }}</p> {{-- Menampilkan penulis buku --}}
    <p><strong>Year of Publication:</strong> {{ $book->year_of_publication }}</p> {{-- Menampilkan tahun terbit buku --}}
    <p><strong>Price:</strong> {{ $book->price }}</p> {{-- Menampilkan harga buku --}}
    <p><strong>Stock:</strong> {{ $book->stock }}</p> {{-- Menampilkan stok buku --}}
    <p><strong>Description:</strong> {{ $book->description }}</p> {{-- Menampilkan deskripsi buku --}}

    {{-- Tautan kembali ke halaman index (daftar buku) --}}
    <a href="{{ route('books.index') }}">Back to List</a>
</body>
</html>
