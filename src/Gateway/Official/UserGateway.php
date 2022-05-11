<?php
namespace Wechat\Gateway\Official;
class UserGateway extends Gateway{
    protected function openapi(){
        return $this->buildAuthUrlFromBase('userinfo');
    }

    protected function getCodeFields(){
        return [
            'access_token' => $this->official['access_token'],
            'openid' => $this->official['openid'],
            'lang' => 'zh_CN'
        ];
    }
}
