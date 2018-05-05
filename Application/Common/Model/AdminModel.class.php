<?php
namespace Common\Model;
use Think\Model;

/**
 * 管理员用户操作
 * @author  Alexander
 */
class AdminModel extends CommonModel {
	private $_db = '';

	public function __construct() {
		$this->_db = M('admin');
	}
   
    //使用模块：admin
    public function getAdmins() {
        $data = array(
            'status' => array('neq',-1),
        );
        return $this->_db->where($data)->order('admin_id desc')->select();
    }

    //使用模块：admin
    public function getAdminByUsername($username='') {
        $res = $this->_db->where('username="'.$username.'"')->find();
        return $res;
    }
}
