<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('index');
});

// Admin routes
Route::get('/admin/menus', [MenuController::class, 'adminIndex'])->name('admin.menus');
Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menus', [MenuController::class, 'store'])->name('admin.menus.store');
Route::get('/admin/menus/{menu}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{menu}', [MenuController::class, 'update'])->name('admin.menus.update');
Route::delete('/admin/menus/{menu}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');


// Customer menu view
Route::get('/menu', [MenuController::class, 'customerView'])->name('menu.menu');


//Order routes
Route::get('/order/manage', function () { return view('order.manage');})->name('order.manage');
// >>>>>>> 95457fd76005c1cc2a7e914a73750e3c84d817f6
