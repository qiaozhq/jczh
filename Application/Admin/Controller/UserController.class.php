<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 团队成员控制器
 * @author  Alexander
 */
class UserController extends CommonController {
    //团队成员首页
    public function index() {
        $users = D('User')->getAdminData('user', 'user_id');
        $this->assign('users', $users);         
        $this->display();
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
            if($_POST['user_id']) {
                return $this->save($_POST);
            } 
            $id = D("User")->insert('user',$_POST);
            if($id) {
                return show(1,'新增成功',$id);
            }
            return show(0,'新增失败',$id);
        }else{
            $this->display();
        }
    }
    
    //取得要修改的用户数据
    public function edit() {
        $id = $_GET['id'];
        $user = D("User")->find('user', $id, 'user_id');
        $this->assign('user',$user);            
        $this->display();
    }

    //修改用户
    public function save($data) {
        $id = $data['user_id'];
        unset($data['user_id']);
        try {
            $result = D("User")->updateDataById('user', $id, $data, 'user_id');
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用
    public function setStatus() {
        return parent::setStatus($_POST,'User','user','user_id');
    }

    //排序
    public function listorder() {
        return parent::listorder('User','user','user_id');
    }   
}