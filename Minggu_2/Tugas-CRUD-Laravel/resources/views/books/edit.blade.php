<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    {{-- Menampilkan error validasi jika terjadi kesalahan input --}}
    @if($errors->any())
        <div style="color:red;">
            <ul>
                {{-- Looping setiap pesan error dan tampilkan --}}
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li> {{-- Menampilkan pesan error --}}
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form untuk mengedit buku lalu mengirim data ke route books.update menggunakan metode PUT --}}
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf {{-- Token CSRF --}}
        @method('PUT') {{-- Mengubah metode HTTP menjadi PUT untuk update data --}}

        {{-- Input field untuk judul buku dengan nilai awal diisi dari data buku yang sedang diedit --}}
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}"><br><br>

        {{-- Input field untuk penulis buku --}}
        <label>Author:</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}"><br><br>

        {{-- Input field untuk tahun terbit buku --}}
        <label>Year of Publication:</label>
        <input type="text" name="year_of_publication" value="{{ old('year_of_publication', $book->year_of_publication) }}"><br><br>

        {{-- Input field untuk harga buku --}}
        <label>Price:</label>
        <input type="text" name="price" value="{{ old('price', $book->price) }}"><br><br>

        {{-- Input field untuk stok buku --}}
        <label>Stock:</label>
        <input type="number" name="stock" value="{{ old('stock', $book->stock) }}"><br><br>

        {{-- Input field untuk deskripsi buku --}}
        <label>Description:</label>
        <textarea name="description">{{ old('description', $book->description) }}</textarea><br><br>

        {{-- Tombol submit untuk memperbarui data buku --}}
        <button type="submit">Update</button>
    </form>
</body>
</html>
