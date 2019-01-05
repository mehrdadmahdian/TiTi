<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class Tweet extends Model
{
    use Userstamps,
        LogsActivity;

    protected $guarded = ['id'];

    protected $casts = [
        'media' => 'array',
      'tweet_media' => 'array',
      'tweet_quoted' => 'array',
      'tweet_user' => 'array',
    ];

    public function twitterAccount() {
        return $this->belongsTo(TelegramChannel::class);
    }

    public function telegramChannel() {
        return $this->belongsTo(TelegramChannel::class);
    }

    public function message() {
        return $this->morphOne(Message::class,'messageable');
    }
}
