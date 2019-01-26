<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 5:54 PM
 */


namespace App\TITI\Twitter\Collector\Type;

use App\TITI\Twitter\Collector\BaseTweetCollector;
use App\TITI\Twitter\Collector\TweetCollectorInterface;
use Illuminate\Support\Collection;

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

    public function setCollectorParameters()
    {
    }

    public function buildQueryParam()
    {
        return 'string'; //todo
    }

    public function callUp(): Collection
    {
        //$getFields = $this->buildQueryParam();
        //$this->twitterObject->getApiInterface()->request($this->method, $getFields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://mehrdadmahdian.ir/api/v1/fetch-timeline/tweetfeed');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);

        if($res){
            if (json_decode($res)->status) {
                $tweets = array();
                foreach (json_decode($res)->data as $tweet) {
                    $tweets[] = (isset($tweet->retweeted_status))? $tweet->retweeted_status : $tweet;
                }
            } else {
                $tweets = collect([]);
            }
            $this->twitterObject->calledTweets = collect($tweets);
            return $this->twitterObject->calledTweets;
        } else {
            $this->twitterObject->calledTweets = new Collection();
            return $this->twitterObject->calledTweets;
        }

    }
}