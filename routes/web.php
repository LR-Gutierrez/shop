<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PurchaseController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login.index');

Route::post('/', [LoginController::class, 'login'])->middleware('guest')->name('login.login');

Route::get('/register', [LoginController::class, 'register'])->name('login.register');

Route::post('/register', [UserController::class, 'store'])->name('login.register');

Route::middleware(['auth'])->group(function () {
    
    Route::prefix('dashboard/')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard.index');

        Route::get('products/comprar/{idproducto}/',[ProductController::class, 'comprar'])->name('productos.comprar');

        
        Route::get('/products/{factura}/generateInvoice',[InvoiceController::class, 'generateInvoice'])->name('factura.generateInvoice');
        
        Route::get('/clientes',[ClienteController::class, 'index']);
        
        Route::get('/usuarios',[UserController::class, 'index']);
        
        Route::post('/logout',[HomeController::class, 'logout'])->name('dashboard.logout');
        
        Route::middleware(['admin'])->prefix('admin/')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin.index');
            
            Route::resource('products', ProductController::class);
            
            Route::resource('users', UserController::class);

            Route::resource('invoices', InvoiceController::class);
        });
    });
    
});
