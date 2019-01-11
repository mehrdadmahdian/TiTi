<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 5:54 PM
 */

namespace App\Twitter\Recorder\Type;

use App\Twitter\Recorder\BaseTweetRecorder;
use App\Twitter\Recorder\TweetRecorderInterface;

class TypenameRecorder extends BaseTweetRecorder implements TweetRecorderInterface
{
    public $method = 'https://api.twitter.com/1.1/statuses/home_timeline.json';
    public $basicQueryParam = [
        'tweet_mode' => 'extended'
    ];
    public $twitterObject;

    public function __construct($twitterObject)
    {
        $this->twitterObject = $twitterObject;
    }

    public function setCollectorSetting()
    {
    }

    public function buildQueryParam()
    {
        return 'string'; //todo
    }

    public function call()
    {
        $getFields = $this->buildQueryParam();
        //$this->twitterObject->getApiInterface()->request($this->method, $getFields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://mehrdadmahdian.ir/api/v1/fetch-timeline/tweetfeed');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res);

    }
}