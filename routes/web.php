<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $html = "
    <h1>Contact App</h1>
    <div>
        <a href='" . route('admin.contacts.index') . "'>Semua Kontak</a>
        <a href='" . route('admin.contacts.create') . "'>Tambah Kontak</a>
        <a href='" . route('admin.contacts.show', 16) . "'>Perlihat Kontak</a>
    </div>
    ";
    return $html;
    // return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/contacts', function () {
        return "<h1>Daftar Kontak</h1>";
    })->name('contacts.index');

    Route::get('/contacts/create', function () {
        return "<h1>Daftar Kontak Baru</h1>";
    })->name('contacts.create');

    Route::get('/contacts/{id}', function ($id) {
        return "Ini kontak ke-" . $id;
    })->whereNumber('id')->name('contacts.show');

    Route::get('/companies/{name?}', function ($name=null) {
        if ($name) {
            return "Nama Perusahaan: " . $name;
        } else {
            return "Nama Perusahaan Kosong";
        }
    })->whereAlphaNumeric('name')->name('companies');
});

Route::fallback(function () {
    return "<h1>Maaf, Halaman yang anda tuju tidak ada<h1>";
});