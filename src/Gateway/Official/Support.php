<?php
namespace Wechat\Gateway\Official;
use Wechat\Gateway\Official;
use GuzzleHttp\Client;
class Support{
    public static function requestApi($url,$fields){
        $client = new Client();
        $response=$client->request('GET',self::httpQuery($url,$fields));
        $token =json_decode($response->getBody()->getContents(),true);
        return $token;
    }

    public static function httpQuery($url,$fields){
        $query=http_build_query($fields, '', '&');
        return Official::URL.$url.'?'.$query;
    }
}