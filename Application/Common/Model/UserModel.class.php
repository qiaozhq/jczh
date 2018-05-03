<?php
namespace Common\Model;
use Think\Model;
/**
 * 用户组操作
 */
class UserModel extends Model {
	private $_db = '';

	public function __construct() {
		$this->_db = M('user');
	}

    //使用模块：home
    public function getUserByUsername($username='') {
        $data = array(
            'name' => $username,
            'status'=>array('neq',-1),
        );
        $res = $this->_db->where($data)->find();
        return $res;
    }

    //使用模块：home
    public function getUserByUserId($adminId=0) {
        $res = $this->_db->where('user_id='.$adminId)->find();
        return $res;
    }

    //使用模块：weixin
    public function getUserByOpenId($openId='') {
        $data = array(
            'status' => array('neq',-1),
            'openid' => $openId,
        );    
        $res = $this->_db->where($data)->find();
        return $res;
    }
    //使用模块：admin
    public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('user_id='.$id)->save($data);
    }
    //使用模块：home
    public function updateByUserId($id, $data) {

        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return  $this->_db->where('user_id='.$id)->save($data); // 根据条件更新记录
    }

    //使用模块：admin
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //使用模块：admin
    public function getUsers() {
        $data = array(
            'status' => array('neq',-1),
        );
        return $this->_db->where($data)->order('listorder desc,user_id desc')->select();
    }

    public function updateStatusById($id, $status) {
        if(!is_numeric($status)) {
            throw_exception("status不能为非数字");
        }
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        $data['status'] = $status;
        return  $this->_db->where('user_id='.$id)->save($data); // 根据条件更新记录
    }

    //使用模块：admin
    public function getTodayLoginUsers() {
        $time = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $data = array(
            'status' => 1,
            'lastlogintime' => array("gt",$time),
        );
        $res = $this->_db->where($data)->count();
        return $res['tp_count'];
    }
}
