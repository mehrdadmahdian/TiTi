<?php
/**
 * Created by PhpStorm.
 * User: m.soltani
 * Date: 9/3/2018 AD
 * Time: 16:33
 */

namespace App\Twitter\Exception;


class FaultyTwitterAccount extends \Exception
{

    protected $message = 'twitter application account info is incomplete';

}