<?php
/**
 * 管理员用户管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class AdminuserController extends CommonController { 
    //管理员用户管理首页
    public function index() {
        $admins = D('Admin')->getAdmins();
        $this->assign('admins', $admins);
        $this->display();
    }

    //增加管理员用户
    public function add() {
        // 保存数据
        if(IS_POST) {
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
            // 新增
            $id = D("Admin")->insert($_POST);
            if(!$id) {
                return show(0, '新增失败');
            }
            return show(1, '新增成功');
        }
        $this->display();
    }

    //启用/禁用管理员用户
    public function setStatus() {
        return parent::setStatus($_POST,'Admin');    
    }

    //个人中心-个人情报取得
    public function personal() {
        $res = $this->getLoginUser();
        $user = D("Admin")->find($res['admin_id']);
        $this->assign('vo',$user);
        $this->display();
    }

    //个人中心-个人情报保存
    public function save() {
        $user = $this->getLoginUser();
        if(!$user) {
            return show(0,'用户不存在');
        }
        $data['realname'] = $_POST['realname'];
        $data['email'] = $_POST['email'];
        try {
            $id = D("Admin")->updateDataById($user['admin_id'], $data);
            if($id === false) {
                return show(0, '配置失败');
            }
            return show(1, '配置成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }
}