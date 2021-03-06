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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Запрет на регистрацию
Route::match(['post', 'get'], 'register', function() {
	Auth::logout();
	return redirect('/');
})->name('register');

//Админ-панель
Route::middleware(['auth'])->prefix('admin')->namespace('Backend')->name('admin.')->group(function () {
	Route::get('/', 'DashboardController@index')->name('index');

	//Настройки
	Route::get('/setting', 'SettingController@index')->name('setting.index');
	Route::post('/setting/store', 'SettingController@store')->name('setting.store');
	Route::post('/setting/setWebhook', 'SettingController@setWebhook')->name('setting.setWebhook');
	Route::post('/setting/getWebhookInfo', 'SettingController@getWebhookInfo')->name('setting.getWebhookInfo');

	//Пользователи Telegram
	Route::get('/bot_users', 'BotUsersController@index')->name('bot_users.index');
});

//Telegram
Route::post('/' . \Telegram::getAccessToken() . '/webhook', function (Request $request) {       
    $update = Telegram::commandsHandler(true);
    return 'ok';
});
Route::get('get-me', 'Backend\SettingController@getMe');