<?php

use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CashPayment;
use App\Http\Controllers\CashPaymentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VNPayController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('user');
Route::get('admin', [HomeController::class, 'indexAdmin'])->name('home.admin')->middleware('auth', 'admin');;

Route::resource('/categories', CategoryController::class)->middleware('admin');
Route::resource('/comments', CommentController::class)->middleware('user');
// Route::resource('/products', ProductController::class);
// Route::resource('/admin', AdminController::class);
// Route::delete('/comments/{id}', 'CommentController@destroy')->name('comments.destroy')->middleware('user');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

Route::get('/game', function () {
    return view('game');
})->name('game');
//SMTP route , dung middleware
Route::view('contact', 'contactForm')->name('contactForm')->middleware('user');
Route::post('/send',[ContactController::class,'send'])->name('send.email')->middleware('user');

Route::get('/books', [BookController::class, 'indexUser'])->middleware('user');
Route::get('/books/', [BookController::class, 'getByKeyWords'])->name('search')->middleware('user');
Route::get('/books/{id}', [BookController::class, 'showUser'])->name('books.showUser')->middleware('user');

Route::get('/categories/{category}', [BookController::class, 'showByCategory'])
    ->name('booksByCategory')->middleware('user');


Route::middleware('auth')->group(function () {
    Route::get('/account/edit', [UserController::class, 'editAccount'])->name('account.edit');
    Route::post('/account/update', [UserController::class, 'updateAccount'])->name('account.update');
    Route::post('/users/{user}/change-password', [UserController::class, 'changePassword'])->name('account.change_password');

});
// Gom nhom cac route , dung middleware de chan khong vao duoc khi chua dang nhap
Route::prefix('admin')->middleware('auth','admin')->group(function () {
    Route::resource('/books', BookController::class);
    Route::get('categories', [CategoryController::class, 'indexAdmin'])->name('categories.indexAdmin');

    Route::get('/users/createUser',[ UserController::class, 'createUser'])->name('users.createUser');
    Route::post('/users/storeUser',[ UserController::class, 'storeUser'])->name('users.storeUser');

    // Resource routes for users management
    Route::resource('users', UserController::class);
    Route::resource('vouchers', VoucherController::class);

    // Route for banning a user
    Route::post('/users/{id}/ban', [UserController::class, 'ban'])->name('users.ban');
    Route::post('/users/{id}/unban', [UserController::class, 'unban'])->name('users.unban');

    //Quan ly don hang
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::post('/orders/{order}/confirm', [AdminOrderController::class, 'confirm'])->name('admin.orders.confirm');
    Route::post('/orders/{order}/cancel', [AdminOrderController::class, 'cancel'])->name('admin.orders.cancel');
    Route::post('/orders/{order}/ship', [AdminOrderController::class, 'ship'])->name('admin.orders.ship');


    //Quan ly thong bao
    Route::get('/noti', [AdminNotificationController::class, 'showUsers'])->name('admin.noti.index');
    Route::post('/send-notification', [AdminNotificationController::class, 'sendNotification'])->name('admin.sendNotification');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'checkUserRole'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});
// lam cart
Route::get('/add-to-cart/{id}/{user_id}', [CartController::class, 'addToCart'])->name('add_to_cart')->middleware('user');
//Goi gio hang
Route::get('/cart-items/{user_id}', [CartController::class, 'getCartItems'])->name('get_cart_items')->middleware('user');
//Xoa ajax
Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('remove_from_cart')->middleware('user');

//Cart
Route::get('/billcart', [CartController::class, 'show'])->name('cart.index')->middleware('user')
;

//Comment ajax
Route::get('/books/{book_id}/comments', [CommentController::class, 'list'])->name('comments.list');
Route::post('/books/{book_id}/comments', [CommentController::class, 'storeAjax'])->name('comments.storeAjax');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

//Quan titi
Route::post('/update-cart-quantity', [CartController::class, 'updateCartQuantity'])->name('update_cart_quantity');
//Xoa item trong gio hang
Route::post('/delete-cart-item', [CartController::class, 'deleteCartItem'])->name('delete_cart_item');

//Vouchers
Route::post('/apply-coupon', [VoucherController::class, 'applyCoupon'])->name('apply_coupon');
Route::post('/store-discount', [CartController::class, 'storeDiscount'])->name('store_discount');

// //Thanh toan
Route::get('/customer-info', [OrderController::class, 'customerInfo'])->name('orders.customer_info');
Route::post('/store-cart-temp', [OrderController::class, 'storeCartTemp'])->name('store_cart_temp');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('orders.place');
Route::post('/clear-discount', [OrderController::class, 'clearDiscount'])->name('clear_discount');

//Xem don dat hang
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::post('/orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');
Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

//Nhan thong bao cua user
Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});
//Thanh toan
Route::post('/orders/{id}/confirm-payment', [OrderController::class, 'confirmPayment'])->name('orders.confirmPayment');
Route::post('/orders/{id}/confirm-delivery', [OrderController::class, 'confirmDelivery'])->name('orders.confirmDelivery');


//VN PAY
Route::post('/vnpay_payment', [VNPayController::class, 'vnpay_payment'])->name('vnpay_payment');
Route::get('/vnpay_return', [VNPayController::class, 'vnpay_return'])->name('vnpay_return');
//Tien mat
Route::post('/cash_payment', [CashPaymentController::class, 'cash_payment'])->name('cash_payment');

//Yeu thich
Route::post('/favorite-book', [FavoritesController::class, 'favoriteBook'])->name('favorite_book');
Route::get('/favorites', [FavoritesController::class, 'showFavorites'])->name('favorites.index');
Route::post('/remove-favorite', [BookController::class, 'removeFavorite'])->name('remove_favorite');

require __DIR__ . '/auth.php';
