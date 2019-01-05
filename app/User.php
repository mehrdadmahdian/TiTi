<?php

namespace App;

use App\Traits\PersianDateTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, PersianDateTrait, LogsActivity, HasRoles;

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile' , 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->morphToMany(Role::class ,'model', 'model_has_roles');
    }

    public function telegramChannels(){
        return $this->hasMany(TelegramChannel::class);
    }

    public function twitterAccounts(){
        return $this->hasMany(TwitterAccount::class);
    }
}
