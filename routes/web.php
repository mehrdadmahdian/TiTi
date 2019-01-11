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

include('panelRoutes.php');

Route::auth();
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});
Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
});
Route::get('/test', function () {
    $setting = [
        'twitterAccount' => App\Models\TwitterAccount::find(1),
        'collector' => [
            'type' => 'timeline',
            'parameters' => [

            ]
        ],
        'processor' => [
            'type' => 'timeline',
            'parameters' => [

            ]
        ],
        'recorder' => [
            'type' => '',
            'parameters' => [

            ]
        ]
    ];
    try {
        return App\Twitter\TwitterObjectBuilder::build($setting)->fetchAndSave();
    } catch (\Exception $e) {
        return dd($e->getMessage());
    }
});