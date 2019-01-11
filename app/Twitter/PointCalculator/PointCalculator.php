<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 1/7/2019
 * Time: 11:43 PM
 */

namespace App\Twitter\PointCalculator;


use Illuminate\Support\Collection;

class PointCalculator
{
    public function analyzeTweets(Collection $tweets)
    {
         return $tweets->map(function($item) {
            $item['point'] = $this->calculate($item);
         });
         return $tweets;
    }

    public function calculate($tweet){
        return $point = 1000;
    }

    public static function build()
    {
        return new self();
    }
}