<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class Handy extends Model
{
    use Userstamps,
        LogsActivity;

    protected $guarded = ['id'];

    protected $casts = [
    ];

    public function telegramChannel() {
        return $this->belongsTo(TelegramChannel::class);
    }

    public function message() {
        return $this->morphOne(Message::class,'messageable');
    }
}
