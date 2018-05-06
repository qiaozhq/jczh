<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 管理员管理控制器
 * @author  Alexander
 */
class AdminuserController extends CommonController { 

    //个人中心-个人情报取得
    public function per() {
        $admin = $this->getLoginUser();
        $this->assign('admin',$admin);
        $this->display();
    }

    //个人中心-个人情报保存
    public function chg() {
        $user = $this->getLoginUser();
        if(!$user) {
            return show(0,'用户不存在');
        }
        if($_POST['oldpas']) {
            if($user['password'] != getMd5Password($_POST['oldpas'])) {
                return show(0,'密码错误');
            }
            $_POST['password'] = getMd5Password($_POST['newpas']);
        }
        $id = $_POST['admin_id'];
        unset($_POST['admin_id']);
        try {
            $result = D("Admin")->updateDataById('admin', $id, $_POST, 'admin_id');
            if($result === false) {
                return show(0,'更新失败');
            }
            $ret = D('Admin')->getAdminByUsername($_POST['username']);
            session('adminUser', $ret);
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //个人中心-个人情报取得 修改密码画面
    public function pas() {
        $admin = $this->getLoginUser();
        $this->assign('admin',$admin);
        $this->display();
    }
}