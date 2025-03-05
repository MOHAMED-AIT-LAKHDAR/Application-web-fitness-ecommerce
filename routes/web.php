<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientOrderController;
use App\Http\Controllers\Client\PanierController;
use App\Http\Controllers\Client\paymentController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\Client\RateReviewController;
use App\Http\Controllers\ProductController;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SocialiteController;
use Laravel\Socialite\Facades\Socialite;


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
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


Auth::routes();

Route::get('/redirect', [SocialiteController::class,'redirectToGoogle'])->name('google.login');
Route::get('/callback', [SocialiteController::class,'handleGoogleCallback']);


Route::controller(App\Http\Controllers\client\ClientController::class)->group(function(){
Route::get('/',[ClientController::class,'index'])->name('fhome');
Route::get('/category',[ClientController::class,'category'])->name('category');
Route::get('/category-product/{name}',[ClientController::class,'viewCategoryProduct'])->name('catergoryproduct');
Route::get('/category-product/{category}/{product}', [ClientController::class, 'viewProduct'])->name('product');
Route::get('/filter', [ShopController::class, 'filter'])->name('product.filter');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('Aboutus.about');
Route::get('/index', [ShopController::class, 'index'])->name('shop.index');

 Route::get('search','searchProducts');
});
Route::post('/search', [ClientController::class,'search'])->name('search');

Route::get('/search-products', [ClientController::class, 'searchProductsList'])->name('search.products.list');

Route::get('/products/autocomplete', [ClientController::class, 'autocomplete'])->name('products.autocomplete');

Route::middleware(['auth'])->group(function(){
    Route::get('/profile',[ClientController::class,'profile'])->name('profile');
    Route::get('/home', [ClientController::class, 'index'])->name('home');
    Route::post('/panier',[PanierController::class,'addpanier'])->name('panier');
    Route::get('/showCart',[PanierController::class,'viewpanier'])->name('viewpanier');
    Route::post('/profile/editprofile/edit',[ClientController::class,'edit'])->name('edit');
    Route::get('/delete_item/{prodid}',[PanierController::class,'deleteprod'])->name('deleteprod');
    Route::post('/update_item',[PanierController::class,'updateitem']);
    Route::get('/checkout',[paymentController::class,'index'])->name('checkout');
    Route::get('/profile/editprofile',[ClientController::class, 'editprofile'])->name('editprofile');
    // verify the information
    Route::post('/verifyinfo',[paymentController::class,'verifyinfo'])->name('verifyinfoclient');
    //payment methods
    Route::get('/payment',[paymentController::class,'payment'])->name('payment');
    //orders
    Route::get('/place_order',[paymentController::class,'placeorder'])->name('placeorder');
    Route::get('/my-order',[ClientOrderController::class,'index'])->name('myorders');
    Route::get('/view-order/{id}',[ClientOrderController::class,'vieworder'])->name('vieworder');
    //widhlist
    Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist');
    Route::post('/add_wishlist',[WishlistController::class,'add'])->name('add');
    Route::post('/delete_wishlist_item',[WishlistController::class,'deletewishlist']);
    // count panier
    Route::get('/load_panier_data',[PanierController::class,'paniercount']);
    // count wishlist
    Route::get('/load_wishlist_data',[WishlistController::class,'wishlistcount']);


    // Add review
    Route::post('/add-rate-review',[RateReviewController::class,'add'])->name('addratereview');
    //Add comment

    Route::get('/pdf-factor/{tracking_no}',[ClientOrderController::class,'pdf'])->name('pdf.factor');

    //uncomplete order
    Route::get('/uncomplete-orde/{tracking_no}',[ClientOrderController::class,'uncomplete'])->name('uncomplete.order');


    //paypal routes :
    // Route::get('payment/paypal','PayPalContoller@payment')->name('payment');
    // Route::get('cancel','PayPalContoller@cancel')->name('payment.cancel');
    // Route::get('payment/success','PayPalContoller@success')->name('payment.success');



});




Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
  Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

  Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('update/{id}', 'update')->name('update');
    Route::get('delete/{id}', 'delete')->name('delete');
    // Route::post('/status/{id}', 'visibility')->name('visibility');
    Route::get('toggle-visibility/{id}', [CategoryController::class, 'toggleVisibility'])->name('toggleVisibility');


  });

  Route::prefix('fournisseur')->controller(FournisseurController::class)->name('fournisseur.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/update/{id}', 'update')->name('update');
    Route::put('/edit/{id}', 'edit')->name('edit');
    Route::delete('/delete/{id}', 'delete')->name('delete');
  });

  Route::prefix('buy')->controller(AchatController::class)->name('buy.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/product/{id}', 'getproduct')->name('getproduct');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/newProduit', 'createnewprod')->name('nvproduit');
    Route::post('/nvprod', 'newproduct')->name('prod');
    Route::get('/details/{reference}', 'details')->name('details');
    Route::get('/delete/{reference}', 'delete')->name('delete');
    Route::get('pdf/{reference}', 'pdf')->name('pdf');
  });

  Route::prefix('/product')->controller(ProductController::class)->name('product.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/details/{id}', 'show')->name('show');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/update/{id}', 'update')->name('update');
    Route::put('/edit/{id}', 'edit')->name('edit');
    Route::get('/delete/{id}', 'delete')->name('delete');
  });

  Route::prefix('/order')->controller(AdminOrderController::class)->name('order.')->group(function(){
    Route::get('','index')->name('index');
    Route::get('/view-order/{id}','vieworder')->name('vieworder');
    Route::put('/updat-order/{id}','updateorder')->name('updateorder');
    Route::get('/history-order','historyorder')->name('history');
    Route::get('pdf/{tracking}', 'pdf')->name('pdf');
    Route::post('/date-order','dateorder')->name('dateorder');
  });

  Route::prefix('/user')->controller(UserController::class)->name('user.')->group(function(){
    Route::get('','index')->name('index');
    Route::get('/view-user/{id}','viewuser')->name('viewuser');
  });

});
