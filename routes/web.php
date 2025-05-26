<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('index');
});

//Route::get('/payment/customerPayment/paymentPage', function () {
 //   return view('payment.customerPayment.paymentPage');
//});

Route::get('/payment/customerPayment/paymentReceipt', function () {
    return view('payment.customerPayment.paymentReceipt');
});

Route::get('/payment/customerPayment/paymentReceipt', function () {
    return view('payment.customerPayment.paymentReceipt');
});
Route::get('/order/cart', function () {
    return view('order.cart');
});



// Admin routes
Route::get('/admin/menus', [MenuController::class, 'index'])->name('admin.menus.index');
Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menus', [MenuController::class, 'store'])->name('admin.menus.store');
Route::get('/admin/menus/{menu}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{id}', [MenuController::class, 'update'])->name('admin.menus.update');
Route::delete('/admin/menus/{menu}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');
Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');




// Customer menu view
Route::get('/menu', [MenuController::class, 'customerMenu'])->name('menu.menu');



//Order routes
Route::get('/order/manage', function () { return view('order.manage');})->name('order.manage');
// >>>>>>> 95457fd76005c1cc2a7e914a73750e3c84d817f6



//Payment routes
Route::get('/payment/customerPayment/paymentPage', [PaymentController::class, 'paymentIndex']);
Route::get('/payment/customerPayment/paymentReceipt', [PaymentController::class, 'receiptIndex']);
Route::get('/payment/customerPayment/orderStatus', [PaymentController::class, 'statusIndex']);
Route::get('/payment/adminPayment/adminPaymentList', [PaymentController::class, 'paymentListIndex']);

Route::get('/payment/adminPayment/adminPaymentList', [PaymentController::class, 'adminPaymentListIndex'])->name('adminPaymentListIndex');
Route::post('/order/store', [OrderController::class, 'storeOrder'])->name('order.store');
Route::get('/orders/{id}', [OrderController::class, 'showOrder']);



