<?php
/**
 * Created by PhpStorm.
 * User: k.kimiaei
 * Date: 2017-09-06
 * Time: 12:51 PM
 */


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout')->middleware(['web']);
Route::get('login', '\App\Http\Controllers\Auth\LoginController@login')->name('logout')->middleware(['web']);

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['web', 'auth', 'permission:admin-login'],
    'namespace' => 'admin'
], function () {
    foreach (config('cruds.routes', []) as $route) {
        $options = [
            'except' => $route['except'],
            'middleware' => 'permission:' . $route['permission'],
        ];
        $controller = (isset($route['controller']) and $route['controller'])
            ? $route['controller']
            :BaseAdminController::class;

        Route::resource($route['name'], $controller, $options);
        Route::get($route['name'].'/datatable/getData', $controller.'@getDatatable')->name($route['name'].'.datatable.getData');
    }
    Route::get('/','DashboardController@index')->name('dashboard');
});