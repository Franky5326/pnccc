<?php

use Src\Route;

Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])->middleware('auth','user');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout'])->middleware('auth');

Route::add('GET', '/books', [Controller\Book::class, 'books']);
Route::add(['GET', 'POST'], '/addbook', [Controller\Book::class, 'addBook'])->middleware('auth');
Route::add(['GET', 'POST'], '/editbook', [Controller\Book::class, 'editBook'])->middleware('auth');

Route::add(['GET', 'POST'], '/adduserbook', [Controller\UserBook::class, 'addUserBook'])->middleware('admin','auth');
Route::add(['GET', 'POST'], '/addreader', [Controller\Reader::class, 'addReader'])->middleware('admin','auth');
Route::add('GET', '/readers', [Controller\Reader::class, 'readers'])->middleware('auth');
Route::add(['GET', 'POST'], '/profile', [Controller\Reader::class, 'profileReader'])->middleware('auth');
Route::add(['GET', 'POST'], '/listBook', [Controller\Reader::class, 'listReaderBook']);