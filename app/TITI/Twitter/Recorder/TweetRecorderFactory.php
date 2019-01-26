<?php
/**
 * Created by PhpStorm.
 * User: mh.mahdian
 * Date: 11/27/2018
 * Time: 6:53 PM
 */


namespace App\TITI\Twitter\Recorder;

use App\Exceptions\FactoryException;
use App\TITI\Twitter\Recorder\Type\RecordAllRecorder;

class TweetRecorderFactory
{

    protected static $classMap = [
        'record-all' => RecordAllRecorder::class,
    ];

    public static function getClassMap(): array
    {
        return self::$classMap;
    }

    public static function factory($name, $twitterObject ){
        $factory = new self();
        $className = $factory->getClass($name);

        if ($twitterObject)
            $object =  new $className($twitterObject);
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