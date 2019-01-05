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

}
