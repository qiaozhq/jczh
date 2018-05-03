<?php
/**
 * 用户管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class UserController extends CommonController {
    //用户管理首页
    public function index() {
        $users = D('User')->getUsers();
        $this->assign('users', $users);         
        $this->display();
    }

    //用户管理明细页面
    public function detail() {
        $order_number = $_GET['id'];
        $orderDetails = D("Order")->findOneDetail($order_number); 
        $this->assign('orderDetails',$orderDetails);   
        $this->assign('order_number',$order_number);           
        $this->display();
    }

    //取得要修改的用户数据
    public function edit() {
        $user_id = $_GET['id'];
        $user = D("User")->getUserByUserId($user_id);
        $this->assign('user',$user);            
        $this->display();
    }

    //修改用户
    public function save() {
        $user_id = $_POST['user_id'];
        unset($_POST['user_id']);
        try {
            $result = D("User")->updateByUserId($user_id, $_POST);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //添加/修改用户信息
    public function add(){
        if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0,'成员名不能为空');
            }
            if(D("User")->getUserByUsername($_POST['name'])){
                return show(0,'成员已经存在');
            } 
            $user_id = D("User")->insert($_POST);
            if($user_id) {
                return show(1,'新增成功',$user_id);
            }
            return show(0,'新增失败',$user_id);
        }else{
            $this->display();
        }
    }
    //分类排序处理
    public function listorder() {
        return parent::listorder('User');
    }
    //启用/禁用管理员用户
    public function setStatus() {
        return parent::setStatus($_POST,'User');    
    }      
}