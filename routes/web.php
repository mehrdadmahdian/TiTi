<?php

include('panelRoutes.php');
Route::auth();


Route::group(['prefix' => 'admin' , 'as' => 'admin.', 'namespace' => 'admin'], function(){
    Route::group(['prefix' => 'users' , 'as' => 'users.'], function(){
        Route::get('datatable', 'UserController@datatable')->name('datatable');
    });
    Route::group(['prefix' => 'telegram_channels' , 'as' => 'telegram_channels.'], function(){
        Route::get('/{TelegramChannel}/setting/form', 'TelegramChannelController@getSettingForm')->name('setting.showForm');
    });
});
/*************************************************************************************************/
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
        $twitterObject =  App\Twitter\TwitterObjectBuilder::build($setting);
        $twitterObject->periodicCall();
    } catch (\Exception $e) {
        return dd($e->getMessage());
    }
});