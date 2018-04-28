<?php
namespace Common\Model;
use Think\Model;
class MainModel extends  Model {
    private $_db = '';
    public function __construct() {
        $this->_db = M('main');
    }

    //使用模块：home
    public function getMainByCategory($category) {
        $data['status'] = array('neq',-1);
        $data['category'] = array('eq',$category);
        $list = $this->_db->where($data)->order('listorder desc,id desc')->select();
        return $list;
    }

    //使用模块：admin
    public function insertMain($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //使用模块：admin
    public function updateMainById($id, $data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('id='.$id)->save($data);
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
        return $this->_db->where('id='.$id)->save($data);
    }

    //使用模块：admin
    public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('id='.$id)->save($data);
    }

    //使用模块：admin
    public function getMain() {
        // $data['status'] = array('eq','0');
        $list = $this->_db->table(array('eeluo_main'=>'t1','eeluo_menu'=>'t2'))->field('t1.*,t2.name')->where('t1.category=t2.menu_id and t1.status != -1 and t2.status != -1')->order('t1.listorder desc,t1.id desc')->select();
        return $list;
    }

    //使用模块：admin home
    public function find($id){
        if(!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('id='.$id)->find();
    }







    //使用模块：home
    public function getComponyNews() {
        $data['status'] = array('eq',1);
        $data['catid'] = array('eq',1);
        $list = $this->_db->where($data)->order('listorder desc,news_id desc')->select();
        return $list;
    }    

    //使用模块：home
    public function getIndustryNews() {
        $data['status'] = array('eq',1);
        $data['catid'] = array('eq',2);
        $list = $this->_db->where($data)->order('listorder desc,news_id desc')->select();
        return $list;
    }


    public function getAdminMenus() {
        $data = array(
            'status' => array('neq',-1),
            'type' => 1,
        );
        return $this->_db->where($data)->order('listorder desc,news_id desc')->select();
    }

    public function getBarMenus() {
        $data = array(
            'status' => 1,
            'type' => 0,
        );
        $res = $this->_db->where($data)
            ->order('listorder desc,news_id desc')
            ->select();
        return $res;
    }
}