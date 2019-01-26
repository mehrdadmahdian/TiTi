<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 1/26/2019
 * Time: 10:44 PM
 */


namespace App\TITI\Telegram;


use App\Models\TelegramChannel;
use App\TITI\Telegram\Exception\TelegramObjectException;

class TelegramObjectBuilder
{
    public static function build(array $setting): TelegramObject
    {
        if (isset($setting['telegramChannel'])) {
            if (!($setting['telegramChannel'] instanceof TelegramChannel)){
                throw new TelegramObjectException(
                    'Incorrect TwitterAccount Object Class Type',
                    'BuilderValidation',
                    trans('exception.message.not_accepted_twitter_account')
                );
            }
        } else {
            throw new TelegramObjectException(
                'Missing Telegram channel in Setting Array',
                'BuilderValidation',
                trans('exception.message.missing_telegram_account')
            );
        }

        $object = new TelegramObject();
        $object->setProperties($setting);

        return $object;
    }

}