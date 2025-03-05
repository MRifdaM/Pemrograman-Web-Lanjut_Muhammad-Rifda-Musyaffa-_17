<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Menampilkan daftar seluruh buku.
     *
     * Method ini mengambil semua data buku dari basis data dan akan dijalankan s
     * dan mengirimkannya ke view 'books.index' untuk ditampilkan.
     */
    public function index()
    {
        // Mengambil semua data buku dari database menggunakan model Book
        $books = Book::all();
        // Mengirim data buku ke view 'books.index' dengan variabel $books
        return view('books.index', compact('books'));
    }
    /**
     * Menampilkan form untuk menambahkan buku baru.
     * 
     * Menyediakan tampilan form agar pengguna dapat memasukkan data buku baru.
     */
    public function create()
    {
        // Mengembalikan view untuk menampilkan form pembuatan buku baru
        return view('books.create');
    }

    /**
     * Menyimpan data buku baru ke dalam basis data.
     *
     * Method ini melakukan validasi terhadap input form,
     * kemudian menyimpan data yang telah divalidasi ke dalam database
     * menggunakan mass assignment.
     */
    public function store(Request $request)
    {
        // Validasi input yang diterima dari form, memastikan semua field yang required terisi
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year_of_publication' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);

        // Menggunakan mass assignment untuk membuat data buku baru dengan data yang sudah divalidasi
        Book::create($request->only(['title', 'author', 'year_of_publication', 'price', 'stock', 'description']));
        // Redirect ke halaman index buku dengan pesan sukses setelah update data
        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }


    /**
     * Menampilkan detail dari satu buku.
     *
     * Menggunakan route model binding untuk mendapatkan data buku tertentu
     * dan mengirimkannya ke view 'books.show' untuk ditampilkan.
     */
    public function show(Book $book)
    {
        // Mengembalikan view 'books.show' dan mengirimkan data buku tertentu melalui route model binding
        return view('books.show', compact('book'));
    }

    /**
     * Menampilkan form untuk mengedit data buku yang sudah ada.
     *
     * Mengambil data buku yang akan diedit melalui route model binding
     * dan mengirimkannya ke view 'books.edit' untuk diperbaharui.
     */
    public function edit(Book $book)
    {
        // Mengembalikan view 'books.edit' untuk menampilkan form edit buku dan mengirimkan data buku yang akan diedit
        return view('books.edit', compact('book'));
    }

    /**
     * Memperbarui data buku yang ada dalam basis data.
     *
     * Method ini menerima data dari form edit, memvalidasinya,
     * dan mengupdate record buku yang bersangkutan menggunakan mass assignment.
     */
    public function update(Request $request, Book $book)
    {
         // Validasi input yang diterima dari form edit, memastikan semua field yang required terisi
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year_of_publication' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);

        // Memperbarui data buku yang sudah ada dengan data baru yang divalidasi menggunakan mass assignment
        $book->update($request->only(['title', 'author', 'year_of_publication', 'price', 'stock', 'description']));
        // Redirect ke halaman index buku dengan pesan sukses setelah update data
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Menghapus data buku dari basis data.
     *
     * Method ini menghapus record buku yang dipilih dan
     * mengarahkan kembali ke halaman daftar buku dengan pesan konfirmasi penghapusan.
     */
    public function destroy(Book $book)
    {
        // Menghapus data buku yang dipilih dari database
        $book->delete();
        // Redirect ke halaman index buku dengan pesan sukses setelah penghapusan data
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
