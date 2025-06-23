<?php

use App\Http\Controllers\AppDesaController;
use App\Http\Controllers\AppLainController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BahasaprogramController;
use App\Http\Controllers\ChangelogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrameworkappController;
use App\Http\Controllers\HakaksesController;
use App\Http\Controllers\InteropController;
use App\Http\Controllers\KatappController;
use App\Http\Controllers\KatdbController;
use App\Http\Controllers\KatpenggunaController;
use App\Http\Controllers\KatplatformController;
use App\Http\Controllers\KatserverController;
use App\Http\Controllers\KeamananController;
use App\Http\Controllers\LayananappController;
use App\Http\Controllers\MonevappController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\PengembanganController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SdmpengembangController;
use App\Http\Controllers\SdmTechnicController;
use App\Http\Controllers\SubdomainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        // dashbaord
        Route::get('aplikasi', [DashboardController::class, 'aplikasi'])->name('aplikasi')
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi|viewer-aplikasi');
        Route::get('spbe', [DashboardController::class, 'spbe'])->name('spbe')
            ->middleware('role:superadmin|admin-spbe');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        // data aplikasi
        Route::resource('application', ApplicationController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        // Route::resource('application/{application}/monevapp', MonevappController::class)
        //     ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('application/{application}/sdmteknic', SdmTechnicController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('application/{application}/sdmpengembang', SdmpengembangController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('application/{application}/interop', InteropController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('application/{application}/pengembangan', PengembanganController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('application/{application}/keamanan', KeamananController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('application/{application}/data', DataController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');

        // monev aplikasi
        Route::resource('monevapp', MonevappController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');

        // portal CMS
        Route::resource('subdomain', SubdomainController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');

        // aplikasi desa
        Route::resource('appdesa', AppDesaController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        // Route::resource('appdesa/{application}/monevapp', MonevappController::class);

        // aplikasi lainnya
        Route::resource('applain', AppLainController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');

        // helper
        Route::resource('faq', FaqController::class)->middleware('role:superadmin');
        Route::resource('changelog', ChangelogController::class)->middleware('role:superadmin');

        // Settings
        Route::resource('opd', OpdController::class)->middleware('role:superadmin');
        Route::resource('user', UserController::class)->middleware('role:superadmin|admin-aplikasi|admin-spbe');
        Route::resource('role', RoleController::class)->middleware('role:superadmin');
        Route::resource('permission', PermissionController::class)->middleware('role:superadmin');
        Route::post('role/{role}/permission', [RoleController::class, 'updatePermission'])->name('role.update-permission')->middleware('role:superadmin');
    });

    Route::prefix('masterapp')->name('masterapp.')->group(function () {
        // master aplikasi
        Route::resource('katapp', KatappController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('katdb', KatdbController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('katserver', KatserverController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('katplatform', KatplatformController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('katpengguna', KatpenggunaController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('bahasaprogram', BahasaprogramController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('frameworkapp', FrameworkappController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
        Route::resource('layananapp', LayananappController::class)
            ->middleware('role:superadmin|admin-aplikasi|operator-aplikasi');
    });

    Route::prefix('helper')->name('helper.')->group(function () {
        // FAQ
        Route::get('faq', [FaqController::class, 'faqHelper'])->name('helper.faq');
        Route::get('changelog', [ChangelogController::class, 'changeLogHelper'])->name('helper.changelog');
    });

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

    // Route::get('/hakakses', [HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    // Route::get('/hakakses/edit/{id}', [HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    // Route::put('/hakakses/update/{id}', [HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    // Route::delete('/hakakses/delete/{id}', [HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');
});
