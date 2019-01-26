<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 1/27/2019
 * Time: 12:32 AM
 */

namespace App\TITI\Telegram;

use App\Models\TelegramChannel;
use mysql_xdevapi\Exception;

class Publisher
{
    public $channelsRepository;
    public $publishableChannels;

    public static function builder($repo)
    {
        return new self($repo);
    }

    public function __construct($repo) // $repo must be in type of TelegramChannel Eloquent Model
    {
        $this->setChannelsRepository($repo);
    }

    public function setChannelsRepository($repo): void
    {
        if ($repo && $repo instanceof ChannelsRepositoryInterface) {
            $this->channelsRepository = $repo;
        } else {
            throw new \Exception('missing channels repository');
        }
    }

    public function getPublishableChannels()
    {
        $this->publishableChannels = $this->channelsRepository->getPublishableChannels();
    }

    public function publish($telegramChannels = null)
    {
        if ($telegramChannels) {
            return $this->publishMultiple($telegramChannels);
        } else {
            return $this->publishAll();
        }
    }
    
    public function publishAll()
    {
        return $this->publishMultiple($this->getPublishableChannels());
    }

    public function publishMultiple($telegramChannels)
    {
        return $this;
    }


}