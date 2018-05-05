<?php
namespace Common\Model;
use Think\Model;

/**
 * 共通操作
 * @author  Alexander
 */
class CommonModel extends Model {
    
    //插入数据
    public function insert($_db, $data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return M($_db)->add($data);
    }

    //管理后台取得数据
    public function getAdminData($_db, $id='id') {
        $data['status'] = array('neq',-1);
        $list = M($_db)->where($data)->order('listorder desc,'.$id.' desc')->select();
        return $list;
    }

    //前台取得数据
    public function getHomeData($_db, $id='id') {
        $data['status'] = array('eq',1);
        $list = M($_db)->where($data)->order('listorder desc,'.$id.' desc')->select();
        return $list;
    }

    //编辑时取得编辑数据
    public function find($_db, $idval, $idname='id'){
        if(!$idval || !is_numeric($idval)) {
            return array();
        }
        return M($_db)->where($idname.'='.$idval)->find();
    }

    //编辑时更新编辑数据
    public function updateDataById($_db, $idval, $data, $idname='id') {
        if(!$idval || !is_numeric($idval)) {
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return M($_db)->where($idname.'='.$idval)->save($data);
    }

    //编辑时更新启用禁用状态
    public function updateStatusById($_db, $idval, $status, $idname='id') {
        if(!is_numeric($status)) {
            throw_exception('status不能为非数字');
        }
        if(!$idval || !is_numeric($idval)) {
            throw_exception('id不合法');
        }
        $data['status'] = $status;
        return M($_db)->where($idname.'='.$idval)->save($data);
    }

    //编辑时更新排序
    public function updateListorderById($_db, $idval, $listorder, $idname='id') {
        if(!$idval || !is_numeric($idval)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'listorder' => intval($listorder),
        );
        return M($_db)->where($idname.'='.$idval)->save($data);
    }

}