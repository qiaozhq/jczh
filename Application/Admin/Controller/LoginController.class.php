<?php
/**
 * 登陆管理
 */
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    //登陆页面，如果登录直接跳转到后台首页
    public function index(){
        if(session('adminUser')) {
           $this->redirect('/admin.php?c=analysis');
        }
        $this->display();
    }

    //登陆检查
    public function check() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!trim($username)) {
            return show(0,'用户名不能为空');
        }
        if(!trim($password)) {
            return show(0,'密码不能为空');
        }
        $ret = D('Admin')->getAdminByUsername($username);
        if(!$ret) {
            return show(0,'该用户不存在');
        }
        if($ret['status'] !=1) {
            return show(0,'该用户未激活');
        }
        if($ret['password'] != getMd5Password($password)) {
            return show(0,'密码错误');
        }
        D("Admin")->updateByAdminId($ret['admin_id'],array('lastlogintime'=>time()));
        session('adminUser', $ret);
        return show(1,'登录成功');
    }
    
    //退出登录
    public function loginout() {
        session('adminUser', null);
        $this->redirect('/admin.php?c=login');
    }
}