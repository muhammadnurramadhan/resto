<?php

use App\Http\Controllers\AddPanggilanDinein;
use App\Http\Controllers\AddPanggilanTakeaway;
use App\Http\Controllers\Antrian;
use App\Http\Controllers\AntrianDineInController;
use App\Http\Controllers\AntrianReservasiController;
use App\Http\Controllers\AntrianTakeAwayController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\InfoWaitersController;
use App\Http\Controllers\LoginWaitersController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterWaitersController;
use App\Http\Controllers\ReservasiAntrian;
use App\Http\Controllers\ReservasiInputEmail;
use App\Http\Controllers\ReservasiInputNama as ControllersReservasiInputNama;
use App\Http\Controllers\ReservasiInputWhatsapp;
use App\Http\Controllers\ReservasiJam;
use App\Http\Controllers\ReservasiJumlah;
use App\Http\Controllers\ReservasiKonfirmasiPembayaran;
use App\Http\Controllers\ReservasiPembayaran;
use App\Http\Controllers\Reservers;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\RestoCabang;
use App\Http\Controllers\RestoIntroController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StatusAntrian;
use App\Http\Controllers\Takeaway;
use App\Http\Controllers\WaitingListAntrian;
use App\Http\Controllers\WaitingListInputEmail;
use App\Http\Controllers\WaitingListInputNama;
use App\Http\Controllers\WaitingListInputWhatsap;
use App\Http\Controllers\WaitingListJumlahOrang;
use App\Http\Controllers\WaitingListKonfirmasi;
use App\Http\Controllers\WaitingListNotifikasi;
use App\Http\Livewire\Qrcode as LivewireQrcode;
use App\Http\Livewire\Resto\Reservasi\ReservasiInputNama;
use App\Http\Livewire\Resto\Waiters\Auth\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Ixudra\Curl\Facades\Curl;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\FlareClient\Http\Client;

// use GuzzleHttp\Client
// Client

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', [HomeController::class, 'home']);
Route::get('dashboard', function () {
	return view('dashboard');
})->name('dashboard');

// 	// frontend - antrian - user

Route::get('billing', function () {
	return view('billing');
})->name('billing');

// 
Route::get('user-management', function () {
	return view('laravel-examples/user-management');
})->name('user-management');

Route::get('/logout', [SessionsController::class, 'destroy']);
Route::get('/user-profile', [InfoUserController::class, 'create']);
Route::post('/user-profile', [InfoUserController::class, 'store']);

// ===================
Route::get('/', [RestoIntroController::class, 'create']);
Route::post('/resto-session', [RestoIntroController::class, 'store']);


// ==============================================================================
// ==============================================================================
// reservasi
Route::get('/reservasi-antrian', [ReservasiAntrian::class, 'create']);
Route::post('/reservasi-antrian-session', [ReservasiAntrian::class, 'store']);

Route::get('/reservasi-cabang', [RestoCabang::class, 'create']);
Route::post('/cabang-session', [RestoCabang::class, 'store']);

Route::get('/reservasi-input-nama', [ControllersReservasiInputNama::class, 'create']);
Route::post('/reservasi-nama-session', [ControllersReservasiInputNama::class, 'store']);

Route::get('/reservasi-input-whatsapp', [ReservasiInputWhatsapp::class, 'create']);
Route::post('/reservasi-whatsapp-session', [ReservasiInputWhatsapp::class, 'store']);

Route::get('/reservasi-input-email', [ReservasiInputEmail::class, 'create']);
Route::post('/reservasi-email-session', [ReservasiInputEmail::class, 'store']);

Route::get('/reservasi-jumlah', [ReservasiJumlah::class, 'create']);
Route::post('/reservasi-jumlah-session', [ReservasiJumlah::class, 'store']);

Route::get('/reservasi-jam', [ReservasiJam::class, 'create']);
Route::post('/reservasi-jam-session', [ReservasiJam::class, 'store']);

Route::get('/reservasi-pembayaran', [ReservasiPembayaran::class, 'create']);
Route::post('/reservasi-pembayaran-session', [ReservasiPembayaran::class, 'store']);

// 
// Route::post('/site', [SiteController::class, 'create']);

Route::get('/pelanggan-add', [PelangganController::class, 'create']);
// Route::post('/pelanggan-add', [PelangganController::class, 'store']);
Route::resource('customer', PelangganController::class);

Route::resource('cabang', CabangController::class);
Route::post('/cabang-store', [CabangController::class, 'store']);
// Route::get('/cabang-destroy', [CabangController::class]);

Route::get('/cabang-add', [CabangController::class, 'create']);
// Route::get('cabangs', [CabangController::class]);

Route::resource('pelanggan', InfoUserController::class);
Route::resource('waiters', InfoWaitersController::class);
// Route::resource('customer', PelangganController::class);
// Route::resource('tambah-pelanggan', InfoUserController::class);
Route::resource('antrian-reservasi', Reservers::class);
Route::resource('antrian-dinein', Antrian::class);
Route::resource('antrian-takeaway', Takeaway::class);
Route::resource('antrian-status', StatusAntrian::class);
Route::get('/tambah-pelanggan', function () {
	return view('livewire.add-pelanggan');
})->name('cek-email');


// ==============
// reservasi user
// ==============
Route::get('/reservasi-cek-email', function () {
	return view('livewire.resto.user.reservasi.reservasi-cek-email');
})->name('cek-email');

Route::get('/reservasi-tunggu-payment', function () {
	return view('livewire.resto.user.reservasi.reservasi-tunggu-payment');
})->name('tunggu-payment');

Route::get('/reservasi-input-pembayaran', function () {
	return view('livewire.resto.user.reservasi.reservasi-input-pembayaran');
})->name('tunggu-payment');


// ====================
// waiting list dine-in
// ====================
Route::get('/waitinglist-cek-notifikasi', function () {
	return view('livewire.resto.user.waitinglist.syarat-ketentuan');
})->name('cek-notifikasi');


// ====================
Route::get('/waiters-edit-profile', [InfoUserController::class, 'waiters_profile']);
Route::post('/waiters-profile-session', [InfoUserController::class, 'edit_profile']);

Route::get('/waiters-password', [InfoUserController::class, 'waiters_password']);
Route::post('/waiters-password-session', [InfoUserController::class, 'ganti_password']);

Route::get('/customer-data', [InfoUserController::class, 'show']);

Route::get('/customer-antrian', [InfoUserController::class, 'show_antrian']);

Route::get('/reservasi-hari-ini', [AntrianReservasiController::class, 'show']);
Route::post('/waitinglist-antrian-session', [WaitingListAntrian::class, 'store']);

Route::get('/waitinglist-input-nama', [WaitingListInputNama::class, 'create']);
Route::post('/waitinglist-nama-session', [WaitingListInputNama::class, 'store']);

Route::get('/waitinglist-input-email', [WaitingListInputEmail::class, 'create']);
Route::post('/waitinglist-email-session', [WaitingListInputEmail::class, 'store']);

Route::get('/waitinglist-input-whatsapp', [WaitingListInputWhatsap::class, 'create']);
Route::post('/waitinglist-whatsapp-session', [WaitingListInputWhatsap::class, 'store']);

Route::get('/waitinglist-jumlah-orang', [WaitingListJumlahOrang::class, 'create']);
Route::post('/waitinglist-jumlah-session', [WaitingListJumlahOrang::class, 'store']);

Route::get('/waitinglist-konfirmasi', [WaitingListKonfirmasi::class, 'create']);
Route::post('/waitinglist-konfirmasi-session', [WaitingListKonfirmasi::class, 'store']);

Route::get('/waitinglist-notifikasi', [WaitingListNotifikasi::class, 'create']);
Route::get('/waitinglist-notifikasi-session', [WaitingListNotifikasi::class, 'store']);

// 

// ====================
// waiting list take away
// ====================
Route::get('/waitingtake-input-email', function () {
	return view('livewire.resto.user.waitingtake.input-email');
})->name('input-email');

Route::get('/waitingtake-jumlah-orang', function () {
	return view('livewire.resto.user.waitingtake.input-jumlah-orang');
})->name('input-jumlah-orang');

Route::get('/waitingtake-input-nama', function () {
	return view('livewire.resto.user.waitingtake.input-nama');
})->name('input-nama');

Route::get('/waitingtake-input-whatsapp', function () {
	return view('livewire.resto.user.waitingtake.input-whatsapp');
})->name('input-whatsapp');

Route::get('/waitingtake-konfirmasi', function () {
	return view('livewire.resto.user.waitingtake.konfirmasi');
})->name('konfirmasi');

Route::get('/waitingtake-notifikasi-antrian', function () {
	return view('livewire.resto.user.waitingtake.notifikasi-cek-antrian');
})->name('notifikasi-cek-antrian');

// syarat dan ketentuan, antrian user 
Route::get('/syarat-dan-ketentuan', function () {
	return view('livewire.resto.user.syarat-ketentuan');
})->name('notifikasi-cek-antrian');

Route::get('/tidak-tersedia', function () {
	return view('livewire.resto.user.tidak-tersedia');
})->name('tidak-tersedia');


// antrian waiters
// waiters auth
Route::get('/waiters-register', [RegisterWaitersController::class, 'create']);
Route::post('/waiters-register-session', [RegisterWaitersController::class, 'store']);

Route::get('/waiters-login', [LoginWaitersController::class, 'create']);
Route::post('/waiters-session', [LoginWaitersController::class, 'store']);
Route::get('/waiters-logout', [LoginWaitersController::class, 'destroy']);

// download
Route::get('reservasi-export', [AntrianReservasiController::class, 'export']);
// });

Route::get('/waiters-menu', function () {
	return view('livewire.resto.waiters.menu-kelola');
})->name('waiters-menu-kelola');

Route::get('/antrian-dine-in', [AntrianDineInController::class, 'show']);
Route::get('/antrian-takeaway', [AntrianTakeAwayController::class, 'show']);

Route::get('/cek-antrian-takeaway', [AntrianTakeAwayController::class, 'show_antrian']);
Route::get('/cari-antrian-takeaway', [AntrianTakeAwayController::class, 'cari']);
Route::get('/cari-antrian-dinein', [AntrianDineInController::class, 'cari']);

// update panggilan dinein
// Route::get('/add-panggilan-dinein', [AntrianDineInController::class, 'edit']);

// pause or stop panggilan dinein
Route::get('/pause-antrian-dinein', [AntrianDineInController::class, 'edit_pause']);
Route::get('/stop-antrian-dinein', [AntrianDineInController::class, 'edit_stop']);
Route::get('/start-antrian-dinein', [AntrianDineInController::class, 'edit_start']);


// update panggilan dinein
// Route::get('/add-panggilan-takeaway{id}', [AntrianTakeAwayController::class, 'edit']);
// Route::get('/user/{id}', [UserController::class, 'show']);

// Route::get('user/{name?}', 'UserController@getName');

// pause or stop panggilan dinein
Route::get('/pause-antrian-takeaway', [AntrianTakeAwayController::class, 'edit_pause']);
Route::get('/stop-antrian-takeaway', [AntrianTakeAwayController::class, 'edit_stop']);
Route::get('/start-antrian-takeaway', [AntrianTakeAwayController::class, 'edit_start']);

// panggilan dinein - fungsi2
Route::get('/panggilan-antrian-dinein', [AntrianDineInController::class, 'show_panggilan']);
Route::get('/next-antrian-dinein', [AntrianDineInController::class, 'edit_next_antrian']);
Route::get('/dinein-tidak-hadir', [AntrianDineInController::class, 'tidak_hadir']);
Route::get('/dinein-panggilan-hadir', [AntrianDineInController::class, 'hadir']);
// Route::get('/add-panggilan-dinein', [AntrianDineInController::class, 'add_panggilan']);


// panggilan takeaway - fungsi2
Route::get('/panggilan-antrian-takeaway', [AntrianTakeAwayController::class, 'show_panggilan']);
Route::get('/next-antrian-takeaway', [AntrianTakeAwayController::class, 'edit_next_antrian']);
Route::get('/takeaway-tidak-hadir', [AntrianTakeAwayController::class, 'tidak_hadir']);
Route::get('/takeaway-panggilan-hadir', [AntrianTakeAwayController::class, 'hadir']);
// Route::get('/add-panggilan-takeaway/{id}', [AntrianTakeAwayController::class, 'edit']);

Route::get('/add-panggilan-takeaway/{id}', [AddPanggilanTakeaway::class, 'update']);
Route::get('/hadir-panggilan-takeaway/{id}', [AddPanggilanTakeaway::class, 'hadir']);
Route::get('/tidak-panggilan-takeaway/{id}', [AddPanggilanTakeaway::class, 'tidak']);
Route::get('/next-panggilan-takeaway/{id}', [AddPanggilanTakeaway::class, 'next']);


Route::get('/add-panggilan-dinein/{id}', [AddPanggilanDinein::class, 'update']);
Route::get('/hadir-panggilan-dinein/{id}', [AddPanggilanDinein::class, 'hadir']);
Route::get('/tidak-panggilan-dinein/{id}', [AddPanggilanDinein::class, 'tidak']);
Route::get('/next-panggilan-dinein/{id}', [AddPanggilanDinein::class, 'next']);

// // stop panggilan dinein
// Route::get('/stop-panggilan-dinein', [AntrianDineInController::class, 'edit']);


Route::get('/waiters-panggilan-antrian', function () {
	return view('livewire.resto.waiters.panggilan-antrian');
})->name('waiters-antrian');

Route::get('/waiters-menu-profile', function () {
	return view('livewire.resto.waiters.menu-profile');
})->name('waiters-antrian');

Route::get('/contact', function () {
	return view('livewire.contact-form');
})->name('waiters-antrian');



Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']);
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');

Route::get('testing', function () {
	$client = Http::get('https://kipi.covid19.go.id/api');
	dd($client);
});


// qr code samples
Route::get('/home-resto', [LivewireQrcode::class, 'render']);
