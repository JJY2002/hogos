<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('index');
});
Route::get('/reset', function () {
    session()->forget('table_no');
    session()->forget('admin');
    return redirect('/');
})->name('reset');
Route::get('/admin-login', function (\Illuminate\Http\Request $request) {
    $inputPassword = $request->query('password');
    $correctPassword = 'asdqwe123'; // Hardcoded password

    if ($inputPassword === $correctPassword) {
        session(['admin' => true]);
        session()->forget('table_no');
        return redirect('/order');
    } else {
        return redirect()->back()->with('error', 'Incorrect admin password');
    }
});

Route::post('/set-table', [OrderController::class, 'initTableNo'])->name('table.set');

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
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/orders/grid', [OrderController::class, 'orderGrid']);
Route::get('/order/manage', [OrderController::class, 'manageOrder'])->name('order.manage');
Route::post('order/storeItem', [OrderController::class, 'storeOrderItem'])->name('order.storeItem');
Route::get('/order/cart', [OrderController::class, 'toCart'])->name('order.cart');
Route::post('/order/update-quantity', [OrderController::class, 'changeQuantity'])->name('order.updateQuantity');
Route::post('/order/update-order', [OrderController::class, 'updateOrder'])->name('order.updateOrder');
Route::get('/order/get-item-quantity/{menuId}', [OrderController::class, 'getItemQuantity'])->name('order.getItemQuantity');
Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
Route::post('/order/update/{id}', [OrderController::class, 'update'])->name('order.update');
Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/orders/store', [OrderController::class, 'store'])->name('order.store');
// >>>>>>> 95457fd76005c1cc2a7e914a73750e3c84d817f6



//Payment routes
Route::get('/payment/customerPayment/paymentPage', [PaymentController::class, 'paymentIndex']);
//Route::get('/payment/customerPayment/paymentReceipt', [PaymentController::class, 'receiptIndex']);
Route::get('/payment/customerPayment/paymentPage', [PaymentController::class, 'paymentIndex'])->name('paymentPage');
Route::get('/payment/customerPayment/paymentReceipt', [PaymentController::class, 'receiptIndex']);
Route::get('/payment/customerPayment/orderStatus', [PaymentController::class, 'statusIndex']);
Route::get('/payment/adminPayment/adminPaymentList', [PaymentController::class, 'paymentListIndex']);

Route::get('/payment/adminPayment/adminPaymentList', [PaymentController::class, 'adminPaymentListIndex'])->name('adminPaymentListIndex');
Route::post('/order/store', [OrderController::class, 'storeOrder'])->name('order.store');
Route::get('/orders/{id}', [OrderController::class, 'showOrder']);
Route::get('/payment/paymentReceipt', [PaymentController::class, 'receiptIndex'])->name('receipt.index');




