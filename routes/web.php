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
use App\Http\Controllers\Backend\SearchController;
use App\Http\Controllers\Backend\ForgotPasswordController;
use App\Http\Controllers\Backend\ResetPasswordController;
use App\Http\Controllers\Backend\DirectorController;
use App\Http\Controllers\Backend\language\LangPageController;
use App\Http\Controllers\Backend\language\ApplicationController;


use App\Http\Controllers\Frontend\language\ApplicantController;
use App\Http\Controllers\Frontend\language\PaymentController;


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
Route::get('/home',[PagesController::class,'index'])->name('home');
Route::get('/about',[PagesController::class,'about'])->name('about');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');
Route::get('/applicant/status',[PagesController::class,'status'])->name('status');


/*
     GEt testimonial route
*/

Route::group(['prefix' => 'testimonial'], function () {
    Route::get('/home',[PagesController::class,'testmonialIndex'])->name('t_home');

});
/*
* Applicant/Student information

*/

Route::group(['prefix' => 'student'], function () {
    Route::get('/application',[StudentController::class,'registration'])->name('student.registration');
    Route::get('/testimonial/status',[StudentController::class,'search_status'])->name('student.search_status');
    Route::post('/registered',[StudentController::class,'store'])->name('student.registered');
    Route::post('/search_info',[SearchStatusController::class,'index'])->name('student.searchinfo');


});


/*
 language certificate route
*/
Route::group(['prefix' => 'language'], function () {
    Route::get('/home',[PagesController::class,'languageIndex'])->name('l_home');
    Route::get('/application',[ApplicantController::class,'application'])->name('student.application');
    Route::post('/registered',[ApplicantController::class,'store'])->name('store');
    Route::get('/status',[ApplicantController::class,'status_search'])->name('search_status');
    Route::post('/search_result',[SearchStatusController::class,'languageSearch'])->name('searchInfo');
    
    Route::get('/transaction', [PaymentController::class, 'exampleEasyCheckout'])->name('payment')->middleware('trancheck');
    Route::post('/pay-with-ajax', [PaymentController::class, 'payViaAjax'])->name('pay');
    // Route::post('/success', [PaymentController::class, 'success']);
    // Route::post('/fail', [PaymentController::class, 'fail']);
    // Route::post('/cancel', [PaymentController::class, 'cancel']);
    // Route::post('/ipn', [PaymentController::class, 'ipn']);


});
/* 
 admin auth routes
*/
 
 Route::group(['prefix' => 'admin'], function () {
    Route::get('/',[AdminController::class,'admin'])->name('admin.logIn');
    Route::post('/logIn',[AdminController::class,'logInData'])->name('admin.loggedin');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');

    //forget password
    Route::get('forget-password', [ForgotPasswordController::class,'getEmail'])->name('forget-password');
    Route::post('forgot-password', [ForgotPasswordController::class,'postEmail'])->name('forgot-password');

    // reset-password
    Route::get('reset-password/{token}', [ResetPasswordController::class,'getPassword']);
    Route::post('reset-Password', [ResetPasswordController::class,'updatePassword'])->name('rest-pass');

 });

Route::group(['prefix' => 'admin','middleware' => 'admincheck'], function () {
    Route::get('/index', [AdminController::class,'index'])->name('student.index');
    Route::get('/studentlist', [AdminController::class,'getStudent'])->name('student.list');
    Route::get('/student_details/{applicant_id}', [AdminController::class,'showDetails'])->name('admin.student.showDetails');
    Route::post('/student_details/update/{applicant_id}', [AdminController::class,'studentUpdate'])->name('studentUpdate');

    Route::post('/student_details/approve/{applicant_id}', [AdminController::class,'approveTestimonial'])->name('admin.student.update');
    Route::get('/student/approve/{applicant_id}', [AdminController::class,'approve'])->name('admin.approve');
    Route::post('/studentlist/change-status', [AdminController::class,'changeActiveStatus'])->name('change.status');

    
    
    Route::get('/adminList', [AdminController::class,'getAdmin'])->name('admin.list');
    Route::get('/create', [AdminController::class,'createAdmin'])->name('admin.create');
    Route::get('/view/{id}', [AdminController::class,'viewAdmin'])->name('admin.view');
    Route::get('/edit/{id}', [AdminController::class,'editAdmin'])->name('admin.edit');
    Route::post('/storeAdmin', [AdminController::class,'storeAdmin'])->name('admin.storeAdmin');
    Route::post('/update/{id}', [AdminController::class,'updateAdmin'])->name('admin.update');
    Route::post('/deleteAdmin/{id}', [AdminController::class,'deleteAdmin'])->name('admin.delete');


    Route::group(['prefix' => 'applicant'], function () {
            
         Route::get('/list', [ApplicationController::class,'getApplicant'])->name('applicant.list');
         Route::get('/edit/{applicant_id}', [ApplicationController::class,'edit'])->name('applicant.edit');
         Route::post('/update/{applicant_id}', [ApplicationController::class,'update'])->name('applicant.update');
         Route::post('/change-status', [ApplicationController::class,'changestatus'])->name('statusChange');
        //  Route::get('/notificatin', [ApplicationController::class,'notification'])->name('notify');
        //  Route::get('/notification', [ApplicationController::class,'sendNotfication'])->name('notification');
        Route::get('/approve/{applicant_id}', [ApplicationController::class,'download'])->name('approve');
        Route::post('/delete/{applicant_id}', [ApplicationController::class,'delete'])->name('cancel');


      
 
     
     });


    Route::group(['prefix' => 'departments'], function () {
            
        Route::get('/', [AdminController::class,'getDept'])->name('dept.list');
        Route::get('/add', [AdminController::class,'createDepartment'])->name('dept.create');
        Route::post('/storeDepartment', [AdminController::class,'storeDepartment'])->name('admin.storeDept');
        Route::get('/edit/{id}', [AdminController::class,'editDept'])->name('dept.edit');
        Route::post('/update/{id}', [AdminController::class,'updateDept'])->name('dept.update');
        Route::post('/delete/{id}', [AdminController::class,'deleteDept'])->name('dept.delete');
        Route::get('/view/{id}', [AdminController::class,'viewDept'])->name('dept.view');

    
    });

    Route::group(['prefix' => 'directors'], function () {
            
        Route::get('/', [DirectorController::class,'index'])->name('director.list');
        Route::get('/add', [DirectorController::class,'create'])->name('director.create');
        Route::post('/store', [DirectorController::class,'store'])->name('admin.store');
        Route::get('/edit/{id}', [DirectorController::class,'edit'])->name('director.edit');
        Route::post('/update/{id}', [DirectorController::class,'update'])->name('director.update');
        Route::post('/delete/{id}', [DirectorController::class,'delete'])->name('director.delete');
        Route::get('/view/{id}', [DirectorController::class,'view'])->name('director.view');

    
    });

    Route::group(['prefix' => 'language'], function () {
            
       Route::get('/', [LangPageController::class,'index'])->name('language.list');
        Route::get('/add', [LangPageController::class,'create'])->name('language.create');
        Route::post('/store', [LangPageController::class,'store'])->name('language.store');
        Route::get('/edit/{id}', [LangPageController::class,'edit'])->name('language.edit');
        Route::post('/update/{id}', [LangPageController::class,'update'])->name('language.update');
        Route::post('/delete/{id}', [LangPageController::class,'delete'])->name('language.delete');
        Route::get('/view/{id}', [LangPageController::class,'view'])->name('language.view');

    
    });


    Route::get('/search', [SearchController::class,'search'])->name('search');
    Route::get('/searchapplicant', [SearchController::class,'searchapplicant'])->name('searchapplicant');
    Route::get('/searchStudent', [SearchController::class,'searchStudent'])->name('searchStudent');




});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->middleware('paymentcheck');
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');