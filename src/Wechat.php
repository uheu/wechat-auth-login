<?php
namespace Wechat;
class Wechat{
    private $config;

    private function __construct(array $config){
        $this->config=$config;
    } 

    public static function __callStatic($method,$config){
        $app=new self(...$config);
        return $app->create($method);
    }

    private function create($method){
        $gateway=__NAMESPACE__.'\\Gateway\\'.ucwords($method);
        if(class_exists($gateway)){
            return new $gateway($this->config);
        }
        echo '1111111'; 
        exit;
    }
}