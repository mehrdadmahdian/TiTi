<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 5:54 PM
 */


namespace App\TITI\Telegram\PublishableFinder\Type;

use App\TITI\Telegram\PublishableFinder\BasePublishableFinder;
use App\TITI\Telegram\PublishableFinder\PublishableFinderInterface;

class Basic extends BasePublishableFinder implements PublishableFinderInterface
{

    public $telegramObject;

    public function __construct($telegramObject)
    {
        $this->telegramObject = $telegramObject;
    }

}