<?php
/**
 * 基本管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class BasicController extends CommonController {
	//基本管理首页
	public function index() {
		$result = D("Basic")->select();
		$this->assign('vo', $result);
		$this->assign('type',1);//设置按钮 基本配置的样式
		$this->display();
	}

	//保存基本配置
	public function save() {
		if($_POST) {
			if(!$_POST['title']) {
				return show(0, '站点信息不能为空');
			}
			if(!$_POST['keywords']) {
				return show(0, '站点关键词不能为空');
			}
			if(!$_POST['description']) {
				return show(0, '站点描述不能为空');
			}
			if($_POST['version']) {
			  $_POST['md5version'] = md5($_POST['version']);
			}
			D("Basic")->save($_POST);
			return show(1, '配置成功');
		}else {
			return show(0, '没有提交的数据');
		}
	}

	//缓存配置页面
	public function cache() {
		$this->assign('type',2);//设置按钮 缓存配置的样式
		$this->display();
	}
}