<?php

use Illuminate\Support\Facades\Route;


/*
    frontend pages
*/

use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\StudentController;
use App\Http\Controllers\Frontend\SearchStatusController;
use App\Http\Controllers\SslCommerzPaymentController;

use App\Http\Controllers\Backend\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[PagesController::class,'index']);
Route::get('/hoMe',[PagesController::class,'index'])->name('home');
Route::get('/about',[PagesController::class,'about'])->name('about');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');
Route::get('/student/regisration',[StudentController::class,'registration'])->name('student.registration');
Route::get('/student/search/status',[StudentController::class,'search_status'])->name('student.search_status');

Route::post('/student/reg_info',[StudentController::class,'store'])->name('student.storeInfo');
Route::post('/student/search_info',[SearchStatusController::class,'index'])->name('student.searchinfo');

/* 
 admin routes
*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class,'index']);
    Route::get('/studentlist', [AdminController::class,'getStudent'])->name('student.list');
    Route::get('/student_details/{applicant_id}', [AdminController::class,'showDetails'])->name('admin.student.showDetails');
   
    Route::post('/student_details/approve/{applicant_id}', [AdminController::class,'approveTestimonial'])->name('admin.student.update');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->middleware('paymentcheck');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
