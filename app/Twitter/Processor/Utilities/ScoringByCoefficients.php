<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 1/7/2019
 * Time: 11:43 PM
 */

namespace App\Twitter\Processor\Utilities;


class ScoringByCoefficients
{
    public static function calculateScore($tweet, $coefficients)
    {
        $scores = array();
        foreach($coefficients as $coefficientKey => $coefficientValue) {
            $methodName = 'calculateScoreItemBy_'.$coefficientKey;
            if (method_exists(get_class() ,$methodName)) {
                $scores[$coefficientKey] = static::$methodName($tweet, $coefficientValue);
            } else {
                return 0;
            }
        }
        return array_sum($scores);
    }

    public static function calculateScoreItemBy_photo($tweet, $coefficientValue)
    {
        if (isset($tweet->extended_entities->media)) {
            foreach ($tweet->extended_entities->media as $media) {

                if ($media->type == 'photo') {
                    return $coefficientValue;
                }
                return 0;
            }
        } else {
            return 0;
        }
    }

    public static function calculateScoreItemBy_video($tweet, $coefficientValue)
    {
        if (isset($tweet->extended_entities->media)) {
            foreach ($tweet->extended_entities->media as $media) {

                if ($media->type == 'video') {
                    return $coefficientValue;
                }
                return 0;
            }
        } else {
            return 0;
        }
    }

    public static function calculateScoreItemBy_gif ($tweet, $coefficientValue)
    {
        if (isset($tweet->extended_entities->media)) {
            foreach ($tweet->extended_entities->media as $media) {

                if ($media->type == 'animated_gif') {
                    return $coefficientValue;
                }
                return 0;
            }
        } else {
            return 0;
        }
    }

    public static function calculateScoreItemBy_retweetCount($tweet, $coefficientValue)
    {
        return $coefficientValue*$tweet->retweet_count;
    }

    public static function calculateScoreItemBy_favoriteCount($tweet, $coefficientValue)
    {
        return $coefficientValue*$tweet->favorite_count;
    }

    public static function calculateScoreItemBy_replyCount($tweet, $coefficientValue)
    {
        return 1;
    }

    public static function calculateScoreItemBy_favoritedByMe($tweet, $coefficientValue)
    {
        return $tweet->favorited * $coefficientValue;
    }

    public static function calculateScoreItemBy_retweetedByMe($tweet, $coefficientValue)
    {
        return $tweet->retweeted * $coefficientValue;
    }

    public static function calculateScoreItemBy_isVerified($tweet, $coefficientValue)
    {
        return $tweet->user->verified * $coefficientValue;
    }

    public static function calculateScoreItemBy_textSize($tweet, $coefficientValue)
    {
        return strlen($tweet->full_text)*$coefficientValue;
    }
}