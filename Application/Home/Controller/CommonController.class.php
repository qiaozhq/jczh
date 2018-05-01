<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
class CommonController extends Controller {
    public function __construct() {
        header("Content-type: text/html; charset=utf-8");
        parent::__construct();
        $basic = D("Basic")->select();
        $service = explode('|',$basic['service']); 
        $this->assign('basic', $basic);
        $this->assign('service', $service); 
    }

    public function _empty(){//方法不存在的时候
        header("HTTP/1.0 404 Not Found");
        $this->display("Index/error");
    }    
}