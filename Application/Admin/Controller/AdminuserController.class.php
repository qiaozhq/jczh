<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 管理员管理控制器
 * @author  Alexander
 */
class AdminuserController extends CommonController { 
    //管理员用户管理首页
    public function index() {
        $admins = D('Admin')->getAdminData('admin', 'admin_id');
        $this->assign('admins', $admins);
        $this->display();
    }

    //增加管理员用户
    public function add() {
        // 保存数据
        if($_POST) {
            if(!isset($_POST['username']) || !$_POST['username']) {
                return show(0, '用户名不能为空');
            }
            if(!isset($_POST['password']) || !$_POST['password']) {
                return show(0, '密码不能为空');
            }
            $_POST['password'] = getMd5Password($_POST['password']);
            // 判定用户名是否存在
            $admin = D("Admin")->getAdminByUsername($_POST['username']);
            if($admin && $admin['status']!=-1) {
                return show(0,'该用户存在');
            }
            if($_POST['admin_id']) {
                return $this->save($_POST);
            }
            // 新增
            $id = D("Admin")->insert('admin',$_POST);
            if(!$id) {
                return show(0, '新增失败');
            }
            return show(1, '新增成功');
        }
        $this->display();
    }

    //个人中心-个人情报取得
    public function personal() {
        $admin = $this->getLoginUser();
        $this->assign('admin',$admin);
        $this->display();
    }

    //个人中心-个人情报保存
    public function save($data) {
        $user = $this->getLoginUser();
        if(!$user) {
            return show(0,'用户不存在');
        }
        $id = $data['admin_id'];
        unset($data['admin_id']);
        try {
            $result = D("Admin")->updateDataById('admin', $id, $data, 'admin_id');
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用管理员用户
    public function setStatus() {
        return parent::setStatus($_POST,'Admin');    
    }

}