<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 5:54 PM
 */


namespace App\TITI\Twitter\Recorder\Type;

use App\TITI\Twitter\Recorder\BaseTweetRecorder;
use App\TITI\Twitter\Recorder\TweetRecorderInterface;

class RecordAllRecorder extends BaseTweetRecorder implements TweetRecorderInterface
{
    public $twitterObject;

    public function record(): void
    {

    }
}