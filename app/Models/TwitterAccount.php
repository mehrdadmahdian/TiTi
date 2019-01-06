<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class TwitterAccount extends Model
{
    use Userstamps,
        LogsActivity;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::Class);
    }

    public function telegramChannels(){
        return $this->belongsToMany(TelegramChannel::Class);
    }

    public function getApiSetting(){
        //dd(isset($this->application_consumer_sercret));
        if (
            ($this->application_oauth_access_token) &&
            ($this->application_oauth_access_token_secret) &&
            ($this->application_consumer_key) &&
            ($this->application_consumer_secret)
        ) {
            return [
                'oauth_access_token' => $this->application_oauth_access_token,
                'oauth_access_token_secret' => $this->application_oauth_access_token_secret,
                'consumer_key' => $this->application_consumer_key,
                'consumer_secret' => $this->application_consumer_secret,
            ];
        } else {
            return null;
        }

    }

}
