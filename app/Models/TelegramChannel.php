<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class TelegramChannel extends Model
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

    public function messages(){
        return $this->hasMany(Message::Class);
    }

}
