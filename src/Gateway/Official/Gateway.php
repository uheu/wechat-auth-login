<?php
namespace Wechat\Gateway\Official;
abstract class Gateway{
    protected $official;
    public function __construct($official){
        $this->official=$official;
    }

    public function official(){
        return $this->openapi();
    }

    protected function buildAuthUrlFromBase($url){
        return Support::requestApi($url,$this->getCodeFields());
    }
}