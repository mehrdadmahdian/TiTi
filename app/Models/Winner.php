<?php

namespace App\Models;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    protected $guarded = ['id'];

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }
}
