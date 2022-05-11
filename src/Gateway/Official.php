<?php
namespace Wechat\Gateway;
class Official{
    const URL='https://api.weixin.qq.com/sns/';

    private $official;

    public function __construct($config){
        $this->official=$config;
    }

    public function __call($method,$params){
        return self::create($method,...$params);
    }

    public function create($methon,$params=[]){
        //配置文件的配置和支付时传递的参数合并
        $this->official = array_merge($this->official,$params);
        //get_class() 获取当前的类的路径
        $gateway = get_class($this)."\\".ucwords($methon)."Gateway";
        if(class_exists($gateway)){
            return self::make($gateway);
        }
        echo '22222';exit;
    }

    public function make($gateway){
        $app=new $gateway($this->official);
        return $app->official();
    }

    public function oauth(){
        $path = 'oauth2/authorize';
        return $this->buildAuthUrlFromBase("https://open.weixin.qq.com/connect/{$path}");
    }

    private function buildAuthUrlFromBase($url){
        $query=http_build_query($this->getCodeFields(), '', '&');
        return $url.'?'.$query.'#wechat_redirect';
    }

    private function getCodeFields(){
        return [
            'appid' => $this->official['appid'],
            'redirect_uri' => $this->official['callback'],
            'response_type' => 'code',
            'scope' =>'snsapi_userinfo',
            'state'=>'STATE'
        ];
    }
}