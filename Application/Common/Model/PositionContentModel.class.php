<?php
namespace Common\Model;
use Think\Model;
/**
 * 推荐位操作
 * 
 */
class PositionContentModel extends Model {
	private $_db = '';

	public function __construct() {
		$this->_db = M('position_content');
	}

	//使用模块：admin home
	public function select($data = array(),$limit=0) {
		if($data['title']) {
			$data['title'] = array('like', '%'.$data['title'].'%');
		}
		$this->_db->where($data)->order('position_id asc,listorder desc ');
		if($limit) {
			$this->_db->limit($limit);
		}
		$list = $this->_db->select();
		return $list;
	}

	//使用模块：admin
	public function find($id) {
		$data = $this->_db->where('id='.$id)->find();
		return $data;
	}

    //使用模块：admin
    public function insert($res=array()) {
    	if(!$res || !is_array($res)) {
    		return 0;
    	}
    	if(!$res['create_time']) {
    		$res['create_time'] = time();
    	}
    	return $this->_db->add($res);
    }

    //使用模块：admin
	public function updateStatusById($id, $status) {
		if(!is_numeric($status)) {
			throw_exception("status不能为非数字");
		}
		if(!$id || !is_numeric($id)) {
			throw_exception("ID不合法");
		}
		$data['status'] = $status;
		return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录
	}

	//使用模块：admin
	public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array('listorder'=>intval($listorder));
        return $this->_db->where('id='.$id)->save($data);
    }
}
