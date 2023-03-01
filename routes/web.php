<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/whyUs', function () {
    return view('whyTrustInsure');
});

Route::get('/bitiAgencyCovers', function () {
    return view('insuaranceCovers');
});

Route::get('/adminLogin', function () {
    return view('auth.adminLogin');
});
Route::get('/custLog', function () {
    return view('auth.logReg');
});

Route::get('/users', function () {
    return view('users.seepayments');
});

Route::post('/loginUsers',[UserLoginController::class,'login']);

Route::get('/editProfile',[UsersController::class, 'editUserProfile']);

Route::put('/updateProfile/{user}',[UsersController::class, 'updateUserProfile']);

Route::get('/viewPaymentProgress',[UsersController::class, 'seePaymentProgress']);

Route::get('/contactUs',[UsersController::class, 'contactUs']);

Route::post('/submitConcern',[UsersController::class, 'submitConcern']);

Route::post('/bookAppointment',[UsersController::class, 'bookAppointment']);

Route::get('/viewFeedback',[UsersController::class, 'viewFeedback']);

Route::get('/viewAppointments',[UsersController::class, 'viewAppointments']);

Route::delete('/deleteUserAppointment/{appointment}',[UsersController::class, 'deleteUserAppointment']);

Route::get('/viewPaymentForm',[UsersController::class, 'viewPaymentForm']);

Route::get('/viewYearlyPaymentForm',[UsersController::class, 'viewYearlyPaymentForm']);

Route::post('/submitPayment',[UsersController::class, 'submitPayment']);

Route::post('/submitYearlyPayment',[UsersController::class, 'submitYearlyPayment']);

Route::get('/viewForms',[UsersController::class, 'viewForms']);

Route::get('/viewSpecifiedForm/{form}',[UsersController::class, 'viewSpecifiedForm']);

Route::get('/viewNotifications',[UsersController::class, 'viewNotifications']);

Route::get('/downloadForm/{form}',[UsersController::class, 'downloadForm']);

Route::get('/viewSubmitForm/{form}',[UsersController::class, 'viewSubmitForm']);

Route::post('/submitFormUser',[UsersController::class, 'submitForm']);

Route::post('/login',[AdminLoginController::class,'login'])->name('admin.login.submit');

Route::get('/adminHome',[AdminController::class,'index'])->name('admin');

Route::get('/registerUser',[AdminController::class,'viewRegisterUser']);

Route::post('/submitUser',[AdminController::class,'submitUser']);

Route::get('/viewUsers',[AdminController::class,'viewUsers']);

Route::get('/editUser/{user}',[AdminController::class,'editUser']);

Route::put('/submitEditedUser/{user}',[AdminController::class,'submitEditedUser']);

Route::delete('/deleteUser/{user}',[AdminController::class,'deleteUser']);

Route::get('/addInsuranceCover',[AdminController::class,'addInsuranceCover']);

Route::post('/submitCover',[AdminController::class,'submitCover']);

Route::get('/viewInsuranceCovers',[AdminController::class,'viewInsuranceCovers']);

Route::get('/editInsuranceCover/{cover}',[AdminController::class,'editInsuranceCover']);

Route::put('/updateInsuranceCover/{cover}',[AdminController::class,'updateInsuranceCover']);

Route::delete('/deleteInsuranceCover/{cover}',[AdminController::class,'deleteInsuranceCover']);

Route::get('/viewReachOuts',[AdminController::class,'viewReachOuts']);

Route::get('/replyFeedback/{feedback}',[AdminController::class,'replyFeedback']);

Route::put('/submitReply/{feedback}',[AdminController::class,'submitReply']);

Route::get('/viewRepliedFeedback',[AdminController::class,'viewRepliedFeedback']);

Route::get('/forms',[AdminController::class,'forms']);

Route::post('/submitForm',[AdminController::class,'submitForm']);


Route::get('/submittedForms',[AdminController::class,'submittedForms']);


Route::get('/viewSubmittedForm/{form}',[AdminController::class,'viewSubmittedForm']);

Route::get('/payments',[AdminController::class,'payments']);

Route::get('/yearlyPayments',[AdminController::class,'yearlyPayments']);

Route::put('/confirmPayment/{payment}',[AdminController::class,'confirmPayment']);

Route::put('/declinePayment/{payment}',[AdminController::class,'declinePayment']);

Route::get('/receivedPayment',[AdminController::class,'receivedPayment']);

Route::put('/confirmYearlyPayment/{payment}',[AdminController::class,'confirmYearlyPayment']);

Route::put('/declineYearlyPayment/{payment}',[AdminController::class,'declineYearlyPayment']);

Route::get('/receivedYearlyPayment',[AdminController::class,'receivedYearlyPayment']);

Route::get('/appointments',[AdminController::class,'appointments']);

Route::put('/acceptAppointment/{appointment}',[AdminController::class,'acceptAppointment']);

Route::put('/declineAppointment/{appointment}',[AdminController::class,'declineAppointment']);

Route::get('/viewAcceptedAppointments',[AdminController::class,'viewAcceptedAppointments']);
