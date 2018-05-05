<?php
namespace Common\Model;
use Think\Model;

/**
 * 产品服务操作
 * @author  Alexander
 */
class ProductModel extends  Model {
    private $_db = '';
    public function __construct() {
        $this->_db = M('product');
    }

    //使用模块：admin
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //使用模块：admin
    public function getProducts() {
        $data['status'] = array('neq',-1);
        $list = $this->_db->where($data)->order('listorder desc,product_id desc')->select();
        return $list;
    }

    //使用模块：home
    public function getComponyProducts() {
        $data['status'] = array('eq',1);
        $data['catid'] = array('eq',1);
        $list = $this->_db->where($data)->order('listorder desc,product_id desc')->select();
        return $list;
    }    

    //使用模块：home
    public function getIndustryProducts() {
        $data['status'] = array('eq',1);
        $data['catid'] = array('eq',2);
        $list = $this->_db->where($data)->order('listorder desc,product_id desc')->select();
        return $list;
    }

    //使用模块：admin home
    public function find($id){
        if(!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('product_id='.$id)->find();
    }

    //使用模块：admin
    public function updateMenuById($id, $data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('product_id='.$id)->save($data);
    }

    //使用模块：admin
    public function updateStatusById($id, $status) {
        if(!is_numeric($status)) {
            throw_exception('status不能为非数字');
        }
        if(!$id || !is_numeric($id)) {
            throw_exception('id不合法');
        }
        $data['status'] = $status;
        return $this->_db->where('product_id='.$id)->save($data);
    }

    //使用模块：admin
    public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('product_id='.$id)->save($data);
    }

    public function getAdminMenus() {
        $data = array(
            'status' => array('neq',-1),
            'type' => 1,
        );
        return $this->_db->where($data)->order('listorder desc,product_id desc')->select();
    }

    public function getBarMenus() {
        $data = array(
            'status' => 1,
            'type' => 0,
        );
        $res = $this->_db->where($data)
            ->order('listorder desc,product_id desc')
            ->select();
        return $res;
    }
}