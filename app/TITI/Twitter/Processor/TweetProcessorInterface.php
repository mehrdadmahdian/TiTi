<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 5:53 PM
 */


namespace App\TITI\Twitter\Processor;

use Illuminate\Support\Collection;

interface TweetProcessorInterface
{
    public function process($tweetCollection):Collection;
}