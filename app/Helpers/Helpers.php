<?php
/**
 * Created by PhpStorm.
 * User: salma
 * Date: 1/11/2019
 * Time: 7:35 PM
 */
function returnJson($status, $message = null, array $data = array())
{
    return [
        'status' => $status,
        'message'=> $message,
        'data' => $data
    ];
}