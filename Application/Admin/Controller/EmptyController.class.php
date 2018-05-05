<?php
namespace Admin\Controller;
use Think\Controller;
class EmptyController extends Controller{
    
    //空操作_empty()方法
    function _empty(){
        header("HTTP/1.0 404 Not Found");
        $this->display("Index/error");
    }
    
    function index(){//控制器不存在的时候
        header("HTTP/1.0 404 Not Found");
        $this->display("Index/error");
    }
}
?>