<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 基本管理控制器
 * @author  Alexander
 */
class BasicController extends CommonController {
	//基本管理首页
	public function index() {
		$basic = D("Basic")->select();
		$this->assign('basic', $basic);
		$this->display();
	}

	//保存基本配置
	public function save() {
		if($_POST) {
			if($_POST['version']) {
			  $_POST['md5version'] = md5($_POST['version']);
			}
			D("Basic")->save($_POST);
			return show(1, '配置成功');
		}else {
			return show(0, '没有提交的数据');
		}
	}

}