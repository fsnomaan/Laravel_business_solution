<?php

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

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/create-customer','TestController@createCustomer');

Auth::routes();



Route::group(['middleware'=>'auth'],function(){

    Route::get('/home', 'HomeController@index')->name('home');

//  For Customer Controller
    Route::resource('customer','CustomerController');
    Route::get('view-all-dues','CustomerController@viewAllDues')->name("viewAllDues");

    //  For Customer Address Controller
    Route::resource('customer-address','CustomerAddressController');

    //  For Product Details Controller
    Route::resource('product-detail','ProductDetailsController');

    //  For Product  Controller
    Route::resource('product','ProductController');
    Route::get('product-update','ProductController@indexEx')->name('productUpdate');

    //  For StockMovement Controller
    Route::resource('stock-movement','StockMovementController');


    //  For Sell Controller
    Route::resource('sell','SellController');

//    For get all customer list API
    Route::get('/get-all-customer','CustomerController@getCustomerList');

    //    For get all customer list API
    Route::get('/get-available-product','ProductController@getProductList');
    Route::get('/get-all-product','ProductController@getAllProductList');


    //  For PDF generating
    Route::get('/invoice/{id}','SellController@getInvoice')->name('getInvoice');



    //Get Sell List API
    Route::get('/get-sell-list','SellController@getSellList')->name('getSellList');

    //  For add cash
    Route::get('/add-cash','PaymentController@addCash')->name('addCash');
    Route::post('/add-cash','PaymentController@storeCash')->name('addCash');
    Route::get('/cash-against-cheque','PaymentController@viewCashAgainstCheque')->name('cashAgainstCheque');
    Route::post('/cash-against-cheque','PaymentController@storeCashAgainstCheque')->name('cashAgainstCheque');


    //  For add cheque
    Route::get('/add-cheque','PaymentController@addCheque')->name('addCheque');
    Route::post('/add-cheque','PaymentController@storeCheque')->name('addCheque');
    Route::get('/all-cheque','PaymentController@allCheque')->name('allCheque');
    Route::get('/paid-cheque/{id}','PaymentController@chequePaid')->name('chequePaid');
    Route::get('/cheque-list','PaymentController@chequeList');


    //  For Sell Controller
    Route::resource('user','UserController');

//    Change Password
    Route::get('/change-password','UserController@changePassword')->name('changePassword');
    Route::post('/change-password','UserController@changePasswordStore')->name('changePassword');


//    Reset Password
    Route::get('/reset-password/{id}','UserController@resetPassword')->name('resetPassword');
    Route::post('/reset-password/{id}','UserController@resetPasswordStore')->name('resetPasswordStore');



    //Get Sell List API
    Route::get('/get-total-due','CustomerController@getCustomerDue')->name('getCustomerDue');



    //Report portion
    Route::get('/single-customer-sales-report','ReportController@showSingleCustomerReport')->name('singleReport');
    Route::post('/single-customer-sales-report','ReportController@viewSingleCustomerReport')->name('singleReport');


    //Expense portion
    Route::resource('expense','ExpenseController');
    Route::get('daily-expense-report','ExpenseController@getDailyExpense')->name('daily_expense_report');
    Route::post('daily-expense-report','ExpenseController@showDailyExpense')->name('daily_expense_report');

    Route::get('daily-financial-report','ExpenseController@getFinancialReport')->name('daily_financial_report');
    Route::post('daily-financial-report','ExpenseController@showFinancialReport')->name('daily_financial_report');


    //  For Adjustment Controller
    Route::resource('adjustment','AdjustmentController');
    Route::get('add-adjustment/{id}','AdjustmentController@addAdjustment')->name('add-adjustment');



    //Report portion
    Route::get('/products-report','ReportController@showSingleProductReport')->name('productsReport');
    Route::post('/products-report','ReportController@viewSingleProductReport')->name('productsReport');


});
