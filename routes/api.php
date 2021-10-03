<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\BillPaymentController;
use App\Http\Controllers\flutterwaveController;
use App\Http\Controllers\RequestFundController;




//newsletter
Route::post('/subscribe-news', [NewsletterController::class, 'create']);
Route::post('/contact-us', [ContactController::class, 'create']);
Route::post('/verify-job/{id}', [AdminController::class, 'verifyJob']);

// authentication
Route::group(['middleware' => 'api','prefix' => 'auth'], function () {
    Route::post('/signin', [AuthController::class, 'signin']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/signout', [AuthController::class, 'signout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/resend-link', [AuthController::class, 'resendLink']);
    Route::post('/send-code', [AuthController::class, 'sendCode']);
    Route::get('/verified/{email}/{verification_code}', [AuthController::class, 'verified']);
    // Route::get('/web-verified/{email}/{verification_code}', [AuthController::class, 'Webverified']);
    // Route::post('/reset-verify', [AuthController::class, 'resetVerify']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/forgot-pin', [AuthController::class, 'forgotPin']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::post('/reset-pin', [AuthController::class, 'resetPin']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


//Profile
Route::group(['middleware' => 'api'], function () {
    Route::post('/update-profile/{id}', [ProfileController::class, 'update']);
});

//Job
Route::group(['middleware' => 'api'], function () {
    Route::post('/post-job', [JobController::class, 'create']);
});

//Skill
Route::group(['middleware' => 'api'], function () {
    Route::post('/add-skill', [SkillsController::class, 'create']);
});



//Investments
// Route::group(['middleware' => 'api'], function () {
//     Route::get('/investment-list', [InvestmentController::class, 'list']);
//     Route::post('/create-investment', [InvestmentController::class, 'create']);
//     Route::post('/update-investments', [InvestmentController::class, 'update']);
//     Route::get('/last-investment', [InvestmentController::class, 'lastInvestment']);
// });

//Deposit
Route::group(['middleware' => 'api'], function () {
    Route::post('/deposit', [DepositController::class, 'create']);
});

//Withdraw
Route::group(['middleware' => 'api'], function () {
    Route::post('/withdraw', [WithdrawController::class, 'create']);
    Route::post('/check-status', [WithdrawController::class, 'check']);
});

//requestfund
Route::group(['middleware' => 'api'], function () {
    Route::post('/request-fund', [RequestFundController::class, 'create']);
    Route::get('/check-request', [RequestFundController::class, 'checkRequest']);
    Route::post('/approve-fund/{id}', [RequestFundController::class, 'update']);
});


    // packages
    Route::get('/package', [PackageController::class,'index']);

    // verify pin
   Route::post('/verifypin', [TransferController::class,'verifypin']);
   Route::post('/bills', [BillPaymentController::class,'create']);


Route::group(['prefix' => 'admin'], function () {
    Route::get('/data', [AdminController::class,'index']);
    Route::get('/me', [AdminController::class,'me']);
    Route::get('/message/{email}', [AdminController::class,'message']);
    Route::post('/login', [AdminController::class, 'adminLogin']);
    Route::post('/ban-user/{id}', [AdminController::class, 'banUser']);
    // all get routes in one route
    Route::get('/banned-users', [AdminController::class, 'bannedUsers']);
    Route::get('/users-total-balance', [AdminController::class, 'totalAccountBalance']);
    // reply mail is a post
    Route::post('/reply-mail', [AdminController::class, 'update']);
    Route::post('/approve-fund-request/{id}', [AdminController::class, 'updateFund']);
});

//flutterwave
Route::get('/bill-categories', [flutterwaveController::class,'billCategories']);
Route::post('/pay-bill', [flutterwaveController::class,'payBills']);
Route::post('/transfers', [flutterwaveController::class,'transfers']);
Route::get('/transfers/{id}', [flutterwaveController::class,'transfer']);
Route::get('/balances/NGN', [flutterwaveController::class,'balance']);
