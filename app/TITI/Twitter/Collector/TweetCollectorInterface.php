<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 5:53 PM
 */


namespace App\TITI\Twitter\Collector;

use Illuminate\Support\Collection;

interface TweetCollectorInterface
{
    public function callUp(): Collection;

}