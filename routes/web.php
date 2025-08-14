<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('books.index');

// Halaman Top 10 Penulis
Route::get('/top-authors', [BookController::class, 'topAuthors'])->name('authors.top');

// Halaman untuk menampilkan form input rating
Route::get('/rate', [BookController::class, 'createRating'])->name('ratings.create');

// Aksi untuk menyimpan rating yang di-submit
Route::post('/rate', [BookController::class, 'storeRating'])->name('ratings.store');
Route::get('/api/authors/{authorId}/books', [BookController::class, 'getBooksByAuthor']);
