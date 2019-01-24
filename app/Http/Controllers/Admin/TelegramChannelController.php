<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TwitterAccount\StoreTwitterAccount;
use App\Http\Requests\TwitterAccount\UpdateTwitterAccount;
use App\Models\TelegramChannel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TelegramChannelController extends BaseAdminController
{
    //permissions to routes
    //permission to access tch_id
    public function index(Request $request)
    {

        $telegramChannels = Auth::user()->telegramChannels;
        return view('admin.telegram-channels.index', compact('telegramChannels'));
    }

    public function store(StoreTwitterAccount $request)
    {
        //todo: complete form requests
        //todo: unique channel id, including @,

        DB::beginTransaction();
        try {
            $telegramChannel = TelegramChannel::create([
                'channel_id'  => $request->channel_id,
                'name'        => $request->name,
                'description' => $request->description,
                //'avatar' => $request->avatar,
            ]);
            Auth::user()->telegramChannels()->attach($telegramChannel->id);

            DB::commit();
            return redirect()->back()->with(['message' => trans('message.store.successful')]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function update(UpdateTwitterAccount $request)
    {

    }

    public function getSettingForm()
    {
        $telegramChannel = TelegramChannel::find(request()->segments()[2]);
        $twitterAccounts = Auth::user()->twitterAccounts;

        return view('admin.telegram-channels.setting.form', compact('telegramChannel', 'twitterAccounts'));
    }
}
