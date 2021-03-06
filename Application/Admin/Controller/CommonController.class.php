<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */

/**
 * 后台用共通控制器
 * @author  Alexander
 */
class CommonController extends Controller {
	public function __construct() {		
		parent::__construct();
		$this->_init();
	}
	//登陆检查 访问后台任何页面，如果没有登录，都跳转到登录页面
	private function _init() {
		$isLogin = $this->isLogin();
		if(!$isLogin) {
			$this->redirect(C('COMMON_INIT_SUCCESS'));
		}
	}

	/**
	 * 获取登录用户信息
	 * @return array
	 */
	public function getLoginUser() {
		return session("adminUser");
	}

	/**
	 * 判定是否登录
	 * @return boolean 
	 */
	public function isLogin() {
		$user = $this->getLoginUser();
		if($user && is_array($user)) {
			return true;
		}
		return false;
	}

	//数据的禁用/启用处理
	public function setStatus($data, $models, $_db, $idname) {
		try {
			if ($_POST) {
				$id = $data['id'];
				$status = $data['status'];
				if (!$id) {
					return show(0, 'ID不存在');
				}
				$res = D($models)->updateStatusById($_db, $id, $status, $idname);
				if ($res) {
					return show(1, '操作成功');
				} else {
					return show(0, '操作失败');
				}
			}
			return show(0, '没有提交的内容');
		}catch(Exception $e) {
			return show(0, $e->getMessage());
		}
	}

	//排序处理
	public function listorder($model='', $_db, $idname) {
		$listorder = $_POST['listorder'];
		$jumpUrl = $_SERVER['HTTP_REFERER'];
		$errors = array();
		try {
			if ($listorder) {
				foreach ($listorder as $id => $v) {
					// 执行更新
					$id = D($model)->updateListorderById($_db, $id, $v, $idname);
					if ($id === false) {
						$errors[] = $id;
					}
				}
				if ($errors) {
					return show(0, '排序失败-' . implode(',', $errors), array('jump_url' => $jumpUrl));
				}
				return show(1, '排序成功', array('jump_url' => $jumpUrl));
			}
		}catch (Exception $e) {
			return show(0, $e->getMessage());
		}
		return show(0,'排序数据失败',array('jump_url' => $jumpUrl));
	}

}