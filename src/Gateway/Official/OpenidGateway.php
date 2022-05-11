<?php
namespace Wechat\Gateway\Official;
class OpenidGateway extends Gateway{
    protected function openapi(){
        return $this->buildAuthUrlFromBase('oauth2/access_token');
    }

    protected function getCodeFields(){
        return [
            'appid' => $this->official['appid'],
            'secret' => $this->official['secret'],
            'code' => $this->official['code'],
            'grant_type' =>'authorization_code'
        ];
    }
}