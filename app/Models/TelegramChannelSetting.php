<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class TelegramChannelSetting extends Model
{
    use Userstamps,
        LogsActivity;
}
