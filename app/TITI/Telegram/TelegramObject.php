<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 1/26/2019
 * Time: 10:44 PM
 */


namespace App\TITI\Telegram;

use App\Models\TelegramChannel;
use App\TITI\Telegram\MessageGenerator\MessageGeneratorFactory;
use App\TITI\Telegram\PublishableFinder\PublishableFinderFactory;

class TelegramObject
{
    protected $telegramChannel;
    protected $messageGenerator;
    protected $publishableFinder;

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

    protected function setTelegramChannel(TelegramChannel $telegramChannel)
    {
        $this->telegramChannel = $telegramChannel;
    }

    protected function setMessageGenerator($messageGeneratorArray)
    {
        if (isset($messageGeneratorArray['type']))
            $this->messageGenerator= MessageGeneratorFactory::factory($messageGeneratorArray['type'], $this);
    }

    protected function setPublishableFinder($publishableFinderArray)
    {
        if (isset($publishableFinderArray['type']))
            $this->publishableFinder = PublishableFinderFactory::factory($publishableFinderArray['type'], $this);
    }

    protected function getTelegramChannel()
    {
        return $this->telegramChannel;
    }

    protected function getMessageGenerator()
    {
        return $this->messageGenerator;
    }

    protected function getPublishableFinder()
    {
        return $this->publishableFinder;
    }
}

