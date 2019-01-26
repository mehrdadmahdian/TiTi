<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 5:54 PM
 */


namespace App\TITI\Telegram\MessageGenerator\Type;

use App\TITI\Telegram\MessageGenerator\BaseMessageGenerator;
use App\TITI\Telegram\MessageGenerator\MessageGeneratorInterface;

class Basic extends BaseMessageGenerator implements MessageGeneratorInterface
{

    public $telegramObject;

    public function __construct($telegramObject)
    {
        $this->telegramObject = $telegramObject;
    }

}