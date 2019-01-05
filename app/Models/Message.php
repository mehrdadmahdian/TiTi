<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class Message extends Model
{
    use Userstamps,
        LogsActivity;

    protected $guarded = ['id'];

    protected $casts = [
    ];

    public function telegramChannel() {
        return $this->belongsTo(TelegramChannel::class);
    }

    public function messageable() {
        $this->morphTo();
    }
}
