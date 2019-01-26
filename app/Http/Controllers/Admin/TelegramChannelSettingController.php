<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TelegramChannelSetting\StoreTelegramChannelSettings;
use App\Http\Requests\TwitterAccount\StoreTwitterAccount;
use App\Http\Requests\TwitterAccount\UpdateTwitterAccount;
use App\Models\TelegramChannel;
use App\Models\TelegramChannelSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TelegramChannelSettingController extends BaseAdminController
{
    public function getForm($id)
    {
        $telegramChannel = TelegramChannel::find($id);
        $twitterAccounts = Auth::user()->twitterAccounts;

        return view('admin.telegram-channels.setting.form', compact('telegramChannel', 'twitterAccounts'));
    }

    public function store($id, StoreTelegramChannelSettings $request)
    {
        $telegramChannel = TelegramChannel::find($id);

        if (!$telegramChannel)
            return $this->error(trans('message.general.wrong_url'));

         TelegramChannelSetting::updateOrCreate(['telegram_channel_id' => $telegramChannel->id],
                                                ['telegram_channel_id' => $telegramChannel->id,
                                                 'main_setting' => $request->setting]);

        return $this->success(trans('message.telegram_channel.setting.success.store'));


    }
}
