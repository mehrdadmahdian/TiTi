<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 1/10/2019
 * Time: 5:35 PM
 */


namespace App\TITI\Twitter;


use App\Models\TwitterAccount;
use App\TITI\Twitter\Exception\TwitterObjectException;

class TwitterObjectBuilder
{
    public static function build(array $setting): TwitterObject
    {
        if (isset($setting['twitterAccount'])) {
            if (!($setting['twitterAccount'] instanceof TwitterAccount)){
                throw new TwitterObjectException(
                    'Incorrect TwitterAccount Object Class Type',
                    'BuilderValidation',
                    trans('exception.message.not_accepted_twitter_account')
                    );
            }
        } else {
            throw new TwitterObjectException(
                'Missing TwitterAccount in Setting Array',
                'BuilderValidation',
                trans('exception.message.missing_twitter_account')
            );
        }

        $object = new TwitterObject();
        $object->setProperties($setting);

        return $object;
    }
}