<?php

include('panelRoutes.php');
Route::auth();


Route::group(['prefix' => 'admin' , 'as' => 'admin.', 'namespace' => 'admin'], function(){
    Route::group(['prefix' => 'users' , 'as' => 'users.'], function(){
        Route::get('datatable', 'UserController@datatable')->name('datatable');
    });
    Route::group(['prefix' => 'telegram_channels/setting' , 'as' => 'telegram_channels.setting.'], function(){
        Route::get('/{id}/form', 'TelegramChannelSettingController@getForm')->name('getForm');
        Route::post('/{id}/store', 'TelegramChannelSettingController@store')->name('store');
    });
});
/*************************************************************************************************/
Route::get('/testTwitterObject', function () {
    $setting = [
        'twitterAccount' => App\Models\TwitterAccount::find(4),
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
        'recorder'  => [
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
        $twitterObject =  App\TITI\Twitter\TwitterObjectBuilder::build($setting);
        $twitterObject->periodicCall();
    } catch (\Exception $e) {
        return dd($e->getMessage());
    }
});

Route::get('/testTelegramObject', function () {
    $setting = [
        'telegramChannel' => App\Models\TelegramChannel::find(18),
        'messageGenerator' => [
            'type' => 'basic',
        ],'publishableFinder' => [
            'type' => 'basic',
        ],

    ];

    try {
        $telegramObject =  App\TITI\Telegram\TelegramObjectBuilder::build($setting);
        dd($telegramObject);
    } catch (\Exception $e) {
        return dd($e->getMessage());
    }
});

Route::get('/testPublisher', function () {
    dd(\App\TITI\Telegram\Publisher::builder(new \App\Models\TelegramChannel())->publish());
});