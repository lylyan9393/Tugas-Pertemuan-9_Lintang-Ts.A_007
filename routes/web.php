<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\KategoriController;  //Controller untuk kategori

Route::get('/', function () {
    return view('welcome');
});

//route baru - return text
Route::get('/hello', function () {
    return 'Hello dari Laravel!';
});

// route dengan html
Route::get('/info', function () {
    return '<h1>Sistem Perpustakaan<h1><p>Selamat datang!</p>';
});

//route dengan JSON
Route::get('/buku', function () {
    return [
        'judul' => 'Laravel Programming',
        'pengarang' => 'John Doe',
        'harga' => 150000
    ];
});

//route dengan parameter required
Route::get('/buku/{id}', function ($id) {
    return "Detail buku dengan ID: " . $id;
});

//route dengan parameter optional
// Route::get('/kategori/{nama?}', function ($nama = 'Semua Kategori') {
//     return "Menampilkan kategori: " . $nama;
// });

//route dengan multiple 
Route::get('/search/{kategori}/{keyword}', function ($kategori, $keyword) {
    return "Cari buku kategori: $kategori dengan keyword: $keyword";
});

//named route
Route::get('/perpustakaan', function () {
    return 'Halaman Perpustakaan';
})->name('perpus.home');

//gunakan named route
Route::get('/test-route', function () {
    $url = route('perpus.home');
    return "URL perpustakaan: " . $url;
});

Route::get('/perpustakaan', function () {
    // Data untuk dikirim ke view
    $nama_sistem = "Sistem Perpustakaan Laravel";
    $versi = "13.0";
    $total_buku = 5;
    
    $buku_list = [
        [
            'judul' => 'Pemrograman PHP',
            'pengarang' => 'Budi Raharjo',
            'harga' => 75000,
            'stok' => 10
        ],
        [
            'judul' => 'Laravel Framework',
            'pengarang' => 'Andi Nugroho',
            'harga' => 125000,
            'stok' => 5
        ],
        [
            'judul' => 'MySQL Database',
            'pengarang' => 'Siti Aminah',
            'harga' => 95000,
            'stok' => 0
        ],
        [
            'judul' => 'Web Design',
            'pengarang' => 'Dedi Santoso',
            'harga' => 85000,
            'stok' => 8
        ],
        [
            'judul' => 'JavaScript Modern',
            'pengarang' => 'Rina Wijaya',
            'harga' => 80000,
            'stok' => 12
        ]
    ];
    
    // Return view dengan data
    return view('perpustakaan.index', [
        'nama_sistem' => $nama_sistem,
        'versi' => $versi,
        'total_buku' => $total_buku,
        'buku_list' => $buku_list
    ]);
});

Route::get('/', function () {
    return view('welcome');
});
 
// Route menggunakan Controller
Route::get('/perpustakaan', [PerpustakaanController::class, 'index']);
Route::get('/buku/{id}', [PerpustakaanController::class, 'show']);
Route::get('/about', [PerpustakaanController::class, 'about']);

//==================================================
// Routing Untuk Data Anggota Perpus (tugas)
//==================================================

Route::get('/anggota', function () {

    $anggota_list = [
        [
            'id' => 1,
            'kode' => 'AGT-001',
            'nama' => 'Lintang Tsaniatu',
            'email' => 'lintang@gmail.com',
            'status' => 'Aktif'
        ],
        [
            'id' => 2,
            'kode' => 'AGT-002',
            'nama' => 'Agil Azzahra',
            'email' => 'agil@gmail.com',
            'status' => 'Aktif'
        ],
        [
            'id' => 3,
            'kode' => 'AGT-003',
            'nama' => 'Nur Hidayah',
            'email' => 'hidayah@gmail.com',
            'status' => 'Aktif'
        ],
        [
            'id' => 4,
            'kode' => 'AGT-004',
            'nama' => 'Halimah Rizqi',
            'email' => 'halimah@gmail.com',
            'status' => 'Nonaktif'
        ],
        [
            'id' => 5,
            'kode' => 'AGT-005',
            'nama' => 'Bintang Lylyan',
            'email' => 'bintang@gmail.com',
            'status' => 'Nonaktif'
        ]
    ];

    return view('anggota.index', compact('anggota_list'));
});

Route::get('/anggota/{id}', function ($id) {

    $anggota_list = [
        [
            'id' => 1,
            'kode' => 'AGT-001',
            'nama' => 'Lintang Tsaniatu',
            'email' => 'lintang@gmail.com',
            'telepon' => '081234567890',
            'alamat' => 'Batang',
            'status' => 'Aktif'
        ],
        [
            'id' => 2,
            'kode' => 'AGT-002',
            'nama' => 'Agil Azzahra',
            'email' => 'agil@gmail.com',
            'telepon' => '087482649982',
            'alamat' => 'Wiradesa',
            'status' => 'Aktif'
        ],
        [
            'id' => 3,
            'kode' => 'AGT-003',
            'nama' => 'Nur Hidayah',
            'email' => 'hidayah@gmail.com',
            'telepon' => '082655730958',
            'alamat' => 'Pekalongan Tirto',
            'status' => 'Aktif'
        ],
        [
            'id' => 4,
            'kode' => 'AGT-004',
            'nama' => 'Halimah Rizqi',
            'email' => 'halimah@gmail.com',
            'telepon' => '082910773455',
            'alamat' => 'Batang',
            'status' => 'Nonaktif'
        ],
        [
            'id' => 5,
            'kode' => 'AGT-005',
            'nama' => 'Bintang Lylyan',
            'email' => 'bintang@gmail.com',
            'telepon' => '087733600826',
            'alamat' => 'Bandung',
            'status' => 'Nonaktif'
        ]
    ];

    $anggota = collect($anggota_list)->firstWhere('id', $id);

    return view('anggota.show', compact('anggota'));
});

//==================================================
// Route untuk kategori controlling
//==================================================

Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
