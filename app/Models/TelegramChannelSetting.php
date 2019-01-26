<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class TelegramChannelSetting extends Model
{
    use Userstamps,
        LogsActivity;

    protected $guarded = ['id'];

    protected $casts = ['main_setting' => 'array', 'extra_setting' => 'array'];

    public function telegramChannel()
    {
        return $this->belongsTo(TelegramChannel::Class);
    }
    
}
