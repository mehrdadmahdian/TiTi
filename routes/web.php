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
            'type' => 'normal',
            'parameters' => [
                'filters' => [
                    'words' => [

                    ],
                ],
                'scoring' => [
                    'type' => 'byCoefficient',
                    'coefficients' => [
                        'photo' => 1,
                        'video' => 1,
                        'gif' => 1,
                        'retweetCount' => 1,
                        'favoriteCount' => 1,
                        //'replyCount' => 1,
                        'favoritedByMe' => 1,
                        'retweetedByMe' => 1,
                        'isVerified' => 1,
                        'textSize' => 1,
                    ]
                ],

            ]
        ],
        'recorder' => [
            'type' => 'record-all', //
            //'type' => 'save-top-as-publishable', //
            //'type' => 'save-all', //
            //'type' => 'save-top', //
            'parameters' => [
                'topCount' => 20,
            ]
        ]
    ];

    try {
        $twitterObject =  App\Twitter\TwitterObjectBuilder::build($setting);
        $twitterObject->periodicCall();
    } catch (\Exception $e) {
        return dd($e->getMessage());
    }
});