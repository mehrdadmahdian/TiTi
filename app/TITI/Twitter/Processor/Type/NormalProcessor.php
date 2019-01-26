<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 5:54 PM
 */


namespace App\TITI\Twitter\Processor\Type;

use App\TITI\Twitter\Processor\BaseTweetProcessor;
use App\TITI\Twitter\Processor\TweetProcessorInterface;
use App\TITI\Twitter\Processor\Utilities\ScoringByCoefficients;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class NormalProcessor extends BaseTweetProcessor implements TweetProcessorInterface
{
    public $twitterObject;
    public $parameters;

    public function __construct($twitterObject)
    {
        $this->twitterObject = $twitterObject;
    }

    public function process($tweetCollection): Collection
    {
        info(date("H:i:s.u"));
        //scoring
        $tweetCollection->map(function($item){
            $item->score = $this->score($item);
        });
        //filtering
        //language selector
        //
        info(date("H:i:s.u"));
        return $this->twitterObject->processedTweets = $tweetCollection;
    }

    public function score($tweet)
    {
       if ($this->parameters['scoring']['type'] == 'byCoefficient') {
            return
                ScoringByCoefficients::calculateScore(
                    $tweet,
                    $this->parameters['scoring']['coefficients']
                );
       } else {
           return 0;
       }
    }
}