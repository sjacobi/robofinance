<?php
use App\Jobs\Test;
use App\Jobs\MoneyTransactionHandler;
use Carbon\Carbon;
use App\User;
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

Route::get('/', 'Test\StartController@view')->name('home');

Route::get('user/list', 'Test\UserController@view')->name('user-list');
Route::get('user/{userId}/select', 'Test\UserController@select')->name('user-select')->where('userId', '^[0-9]+$');

Route::group(['middleware' => ['customAuth']], function () {
    Route::get('transaction/create', 'Test\TransactionController@create')->name('transaction-create');
    Route::post('transaction/store', 'Test\TransactionController@store')->name('transaction-store');
});


/*Route::get('/', function () {

//    Test::dispatch();
//    dispatch(new MoneyTransactionHandler);
//    MoneyTransactionHandler::dispatch();

//    dd(config('app.pass_domain'));

    $job = (new MoneyTransactionHandler())
//        ->delay(Carbon::now()->addMinutes(10))
        ->onQueue('default')
        ->onConnection('redis');

    dispatch($job);

    return view('welcome');
});*/
