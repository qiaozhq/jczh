<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 登陆管理控制器
 * @author  Alexander
 */
class LoginController extends Controller {
    //登陆页面，如果登录直接跳转到后台首页
    public function index(){
        if(session('adminUser')) {
           $this->redirect(C('LOGIN_INDEX_SUCCESS'));
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
        D("Admin")->updateDataById('admin', $ret['admin_id'],array('lastlogintime'=>time()), 'admin_id');
        session('adminUser', $ret);
        return show(1,'登录成功', array('jump_url' => C('LOGIN_CHECK_SUCCESS')));
    }
    
    //退出登录
    public function loginout() {
        session('adminUser', null);
        $this->redirect(C('LOGIN_LOGINOUT_SUCCESS'));
    }
}