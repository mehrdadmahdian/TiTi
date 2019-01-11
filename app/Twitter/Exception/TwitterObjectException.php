<?php
/**
 * Created by PhpStorm.
 * User: m.soltani
 * Date: 9/3/2018 AD
 * Time: 16:33
 */

namespace App\Twitter\Exception;


class TwitterObjectException extends \Exception
{

    private $exceptionType;
    private $messageArray;
    private $userFriendlyMessage;

    public function __construct($message, $exceptionType = null,$userFriendlyMessage = null)
    {
        parent::__construct($message, 0, null);

        $this->exceptionType = $exceptionType;
        $this->userFriendlyMessage = $userFriendlyMessage;
        if (is_array(json_decode($message))) {
            $this->messageArray = json_decode($message);
        }
    }

    public function getMessagesArray() {
        return $this->messageArray;
    }

    public function getUserFriendlyMessage(){
        return $this->userFriendlyMessage;
    }

}