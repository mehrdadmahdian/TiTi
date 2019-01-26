<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 6:53 PM
 */


namespace App\TITI\Telegram\MessageGenerator;

use App\Exceptions\FactoryException;
use App\TITI\Telegram\MessageGenerator\Type\Basic;

class MessageGeneratorFactory
{

    protected static $classMap = [
        'basic' => Basic::class,
    ];

    public static function getClassMap(): array
    {
        return self::$classMap;
    }

    public static function factory($name, $telegramObject ){
        $factory = new self();
        $className = $factory->getClass($name);

        if ($telegramObject)
            $object =  new $className($telegramObject);
        else
            $object = new $className();

        return $object;
    }


    public function getClass($stringClass){

        if(array_key_exists($stringClass, self::$classMap))
            return self::$classMap[$stringClass];

        if(class_exists($stringClass))
            return $stringClass;

        throw new FactoryException('Could not find class name in classmap');
    }

}