<?php
namespace Common\Model;
use Think\Model;

/**
 * 团队成员操作
 * @author  Alexander
 */
class UserModel extends CommonModel {
	private $_db = '';

	public function __construct() {
		$this->_db = M('user');
	}

    //使用模块：admin
    public function getUserByUsername($username='') {
        $data = array(
            'name' => $username,
            'status'=>array('neq',-1),
        );
        $res = $this->_db->where($data)->find();
        return $res;
    }

}