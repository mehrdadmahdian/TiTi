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
use App\Twitter\Collector\TweetCollectorFactory;
use App\Twitter\Exception\FaultyTwitterAccount;

class TwitterObject
{
    protected $twitterAccount;
    protected $collector;
    protected $apiInterface;

    public function __construct(TwitterAccount $twitterAccount)
    {
        $this->setAccount($twitterAccount);
        $this->setApiInterface();
    }

    public function setApiInterface()
    {
        $apiSetting = $this->twitterAccount->getApiSetting();
        $this->apiInterface  = $apiSetting ? new TwitterAPIExchange($apiSetting) : null;
    }

    public function setAccount(TwitterAccount $twitterAccount)
    {
        $this->twitterAccount = $twitterAccount;
    }

    public function getApiInterface()
    {
        return $this->apiInterface;
    }

    public function setCollector($collectorType)
    {
        $this->collector = TweetCollectorFactory::factory($collectorType);
    }

    public function getCollector()
    {
        return $this->collector;
    }

    public function collectTweets($collectorType)
    {
        $this->setCollector($collectorType);
        return $this->collector->call();
    }

}