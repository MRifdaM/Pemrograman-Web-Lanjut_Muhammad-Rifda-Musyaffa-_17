<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
</head>
<body>
    <h1>Add New Book</h1>
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

    {{-- Form untuk menambahkan buku baru dan akan mengirim data ke route books.store --}}
    <form action="{{ route('books.store') }}" method="POST">
        @csrf {{-- Token CSRF untuk keamanan form --}}

        {{-- Input field untuk judul buku --}}
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}"><br><br>

        {{-- Input field untuk penulis buku --}}
        <label>Author:</label>
        <input type="text" name="author" value="{{ old('author') }}"><br><br>

        {{-- Input field untuk tahun terbit buku --}}
        <label>Year of Publication:</label>
        <input type="text" name="year_of_publication" value="{{ old('year_of_publication') }}"><br><br>

        {{-- Input field untuk harga buku --}}
        <label>Price:</label>
        <input type="text" name="price" value="{{ old('price') }}"><br><br>

        {{-- Input field untuk stok buku --}}
        <label>Stock:</label>
        <input type="number" name="stock" value="{{ old('stock') }}"><br><br>

        {{-- Input field untuk deskripsi buku --}}
        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        {{-- Tombol submit untuk menyimpan data buku --}}
        <button type="submit">Save</button>
    </form>
</body>
</html>
