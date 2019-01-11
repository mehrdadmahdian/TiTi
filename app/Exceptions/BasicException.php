<?php

namespace App\Exceptions;

use Exception;

class BasicException extends Exception
{
    private $exceptionType;
    private $messageArray;
    private $userFriendlyMessage;

    public function __construct($message, $exceptionType = null, $userFriendlyMessage = null)
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
