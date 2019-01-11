<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 12/29/2018
 * Time: 11:59 PM
 */

namespace App\Twitter;


use App\Models\TwitterAccount;
use App\Services\Twitter\API\TwitterAPIExchange;
use App\Twitter\Collector\TweetRecorderFactory;
use App\Twitter\Exception\TwitterObjectException;
use App\Twitter\PointCalculator\PointCalculator;

class TwitterObject
{
    protected $twitterAccount;
    protected $collector;
    protected $apiInterface;
    protected $fetchedTweets;
    protected $setting;

    public function __construct()
    {
    }

    public function setProperties($setting): void
    {
        $this->setAccount($setting['twitterAccount']);

        if (isset($setting['collector']['type']))
            $this->setCollector($setting['collector']['type']);

        $this->setApiInterface();
    }

    protected function setApiInterface(): void
    {
        $apiSetting = $this->twitterAccount->getApiSetting();
        $this->apiInterface  = $apiSetting ? new TwitterAPIExchange($apiSetting) : null;
    }

    public function getApiInterface()
    {
        return $this->apiInterface;
    }

    protected function setAccount(TwitterAccount $twitterAccount)
    {
        $this->twitterAccount = $twitterAccount;
    }

    protected function setCollector($collectorType)
    {
        $this->collector = TweetRecorderFactory::factory($collectorType, $this);
    }

    public function getCollector()
    {
        return $this->collector;
    }

    public function fetchAndSave()
    {
        $this->fetchedTweets = $this->collector->call();
        $fetchedTweetsCollection = collect($this->fetchedTweets);
        dd($fetchedTweetsCollection);
        PointCalculator::build()->analyzeTweets();
        return  $this->fetchedTweets;
    }
}