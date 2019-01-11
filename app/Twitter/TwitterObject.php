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
use App\Twitter\Collector\TweetCollectorInterface;
use App\Twitter\Processor\TweetProcessorFactory;
use App\Twitter\Processor\TweetProcessorInterface;
use App\Twitter\Recorder\TweetRecorderFactory;
use App\Twitter\Recorder\TweetRecorderInterface;

class TwitterObject
{
    protected $setting;

    protected $twitterAccount;
    protected $collector;
    protected $processor;
    protected $recorder;

    protected $apiInterface;

    public $calledTweets;
    public $processedTweets;

    public function __construct()
    {
    }

    public function setProperties($setting): void
    {
        foreach($setting as $key => $value) {
            $setter = 'set'.ucfirst($key);
            if (method_exists($this, $setter))
                $this->$setter($value);
        }
    }

    protected function setApiInterface(): void
    {
        $apiSetting = $this->twitterAccount->getApiSetting();
        $this->apiInterface  = $apiSetting ? new TwitterAPIExchange($apiSetting) : null;
    }

    protected function setTwitterAccount(TwitterAccount $twitterAccount)
    {
        $this->twitterAccount = $twitterAccount;
        $this->setApiInterface();
    }

    protected function setCollector($collectorArray)
    {
        if (isset($collectorArray['type']))
            $this->collector = TweetCollectorFactory::factory($collectorArray['type'], $this);
    }

    protected function setProcessor($processorArray)
    {
        if (isset($processorArray['type'])) {
            $this->processor = TweetProcessorFactory::factory($processorArray['type'], $this);
            $this->processor->parameters = $processorArray['parameters'];
        }
    }

    protected function setRecorder($recorderArray)
    {
        if (isset($recorderArray['type']))
            $this->recorder = TweetRecorderFactory::factory($recorderArray['type'], $this);
    }

    ////////////////////////////////////////////////////////////////
    public function getCollector(): TweetCollectorInterface
    {
        return $this->collector;
    }

    public function getProcessor(): TweetProcessorInterface
    {
        return $this->processor;
    }

    public function getRecorder(): TweetRecorderInterface
    {
        return $this->recorder;
    }

    public function getApiInterface()
    {
        return $this->apiInterface;
    }

    /////////////////////////////////////////////////////////////////
    public function periodicCall()
    {
        try {
            $this->collector->callUp();
            $this->processor->process($this->calledTweets);
            dd($this->processedTweets->sortByDesc('score'));
            $this->recorder->record($this->processedTweets);

            return outputJsoner(true, trans('twitterObject.action.message.successful_periodic_call'));
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTraceAsString());
            return outputJsoner(false, $e->getMessagesArray(), []);
        }
    }
}