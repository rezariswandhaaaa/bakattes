<?php

use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Admin\AdminVoucherController;
use App\Http\Controllers\Admin\PertanyaanControlller;
use App\Http\Controllers\Admin\RiwayatTesController;
use App\Http\Controllers\User\ProdukController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\TesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\TransaksiController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', function () {
    $produks = Produk::all();
    return view('guest.produk', compact('produks'));
});
Route::get('/kontak', function () {
    return view('guest.kontak');
});
Route::get('/tentang', function () {
    return view('guest.tentang');
});



/*
|--------------------------------------------------------------------------
| Authenticated Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/api/cek-notif-transaksi', [AdminController::class, 'cekNotif'])->name('admin.api.notif');
    // kelola user
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    //kelola tes
    Route::get('admin/pertanyaan', [PertanyaanControlller::class, 'index'])->name('pertanyaan.index');
    Route::get('admin/pertanyaan/create', [PertanyaanControlller::class, 'create'])->name('pertanyaan.create');
    Route::post('admin/pertanyaan', [PertanyaanControlller::class, 'store'])->name('pertanyaan.store');
    Route::get('admin/pertanyaan/{pertanyaan}/edit', [PertanyaanControlller::class, 'edit'])->name('pertanyaan.edit');
    Route::put('admin/pertanyaan/{pertanyaan}', [PertanyaanControlller::class, 'update'])->name('pertanyaan.update');
    Route::delete('admin/pertanyaan/{id}', [PertanyaanControlller::class, 'destroy'])->name('pertanyaan.destroy');

    Route::get('/pertanyaan/download-template', [PertanyaanControlller::class, 'downloadTemplate'])->name('pertanyaan.download.template');
    Route::post('/pertanyaan/import-excel', [PertanyaanControlller::class, 'importExcel'])->name('pertanyaan.import.excel');

    Route::get('/riwayat-tes', [RiwayatTesController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat-tes/download/{id}', [RiwayatTesController::class, 'download'])->name('riwayat.download');

    Route::get('/admin/produk', [AdminProdukController::class, 'index'])->name('admin.produk.index');
    Route::get('/admin/produk/create', [AdminProdukController::class, 'create'])->name('admin.produk.create');
    Route::post('/admin/produk', [AdminProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('/admin/produk/{produk}/edit', [AdminProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/admin/produk/{produk}', [AdminProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/admin/produk/{produk}', [AdminProdukController::class, 'destroy'])->name('admin.produk.destroy');

    Route::get('/admin/voucher', [AdminVoucherController::class, 'index'])->name('admin.voucher.index');
    Route::get('/admin/voucher/create', [AdminVoucherController::class, 'create'])->name('admin.voucher.create');
    Route::post('/admin/voucher', [AdminVoucherController::class, 'store'])->name('admin.voucher.store');
    Route::delete('/admin/voucher/{id}', [AdminVoucherController::class, 'destroy'])->name('admin.voucher.destroy');

    Route::get('/admin/transaksi', [AdminTransaksiController::class, 'index'])->name('admin.transaksi.index');
    Route::patch('/admin/transaksi/{id}/setuju', [AdminTransaksiController::class, 'setuju'])->name('admin.transaksi.setuju');

    Route::get('/lihat-bukti/{filename}', function ($filename) {
        $path = storage_path('app/public/bukti_pembayaran/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    })->name('lihat.bukti');
});


/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    //topbar
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/kontak-user', function () {
        return view('user.kontak');
    })->name('user.kontak');
    Route::get('/tentang-user', function () {
        return view('user.tentang');
    })->name('user.tentang');

    // produk
    Route::get('/produk-user', [ProdukController::class, 'index'])->name('user.produk');
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('user.transaksi.store');

    Route::get('/transaksi/sukses', [TransaksiController::class, 'sukses'])->name('transaksi.sukses');
    Route::get('/transaksi/{id}/detail', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::post('/transaksi/{id}/upload-bukti', [TransaksiController::class, 'uploadBukti'])->name('transaksi.upload_bukti');

    Route::get('/transaksi/gagal', function () {
        return view('user.transaksi.gagal');
    })->name('transaksi.gagal');


    Route::get('/tes', [TesController::class, 'index'])->name('user.tes.index');
    Route::get('/tes/mulai', [TesController::class, 'mulai'])->name('user.tes.mulai');

    Route::post('/tes/simpan-ajax', [TesController::class, 'simpanAjax'])->name('user.tes.simpanAjax');
    Route::post('/tes/simpan-sementara', [TesController::class, 'simpanSementara'])->name('user.tes.simpanSementara');
    Route::get('/tes/hasil', [TesController::class, 'hasil'])->name('user.tes.hasil');
    Route::get('/tes/hasil/download', [TesController::class, 'downloadPdf'])->name('user.tes.download');
    Route::get('/tes/reset', [TesController::class, 'reset'])->name('user.tes.reset');
    Route::get('/tes/home', [TesController::class, 'home'])->name('user.tes.home');
});


require __DIR__ . '/auth.php';
