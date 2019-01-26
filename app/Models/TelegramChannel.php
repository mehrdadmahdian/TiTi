<?php

namespace App\Models;

use App\TITI\Telegram\ChannelsRepositoryInterface;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class TelegramChannel extends Model implements ChannelsRepositoryInterface
{
    use Userstamps,
        LogsActivity;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::Class);
    }

    public function twitterAccounts(){
        return $this->belongsToMany(TwitterAccount::Class);
    }

    public function messages()
    {
        return $this->hasMany(Message::Class);
    }

    public function setting()
    {
        return $this->hasOne(TelegramChannelSetting::Class);
    }

    public function getPublishableChannels()
    {
        return static::all();
        //todo
        //where active
        //where admin
        //where has twitter account
        //where not banned
        //where ...
    }

}
