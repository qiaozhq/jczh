<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * empty控制器
 * @author  Alexander
 */
class EmptyController extends Controller{
    
    //空操作_empty()方法
    public function _empty(){
        header("HTTP/1.0 404 Not Found");
        $this->display(C('EMPTY_EMPTY_SUCCESS'));
    }

    //控制器不存在的时候
    public function index(){
        header("HTTP/1.0 404 Not Found");
        $this->display(C('EMPTY_EMPTY_SUCCESS'));
    }
}
?>