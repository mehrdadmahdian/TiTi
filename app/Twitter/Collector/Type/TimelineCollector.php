<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 5:54 PM
 */

namespace App\Twitter\Collector\Type;

use App\Twitter\Collector\BaseTweetCollector;
use App\Twitter\Collector\TweetCollectorInterface;

class TimelineCollector extends BaseTweetCollector implements TweetCollectorInterface
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

    public function collect(){
        $getFields = $this->buildQueryParam();
        $this->twitterObject->getApiInterface()->request($this->method, $getFields);
    }
}