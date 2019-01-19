<?php

namespace App\Http\Controllers\Admin;

use App\Models\TelegramChannel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TelegramChannelController extends BaseAdminController
{
    public function index(Request $request)
    {
        $telegramChannels = TelegramChannel::all();
        return view('admin.telegram-channels.index', compact('telegramChannels'));
    }
}
