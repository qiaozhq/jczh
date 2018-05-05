<?php
namespace Common\Model;
use Think\Model;

/**
 * 招聘信息操作
 * @author  Alexander
 */
class JobModel extends CommonModel {
    private $_db = '';
    
    public function __construct() {
        $this->_db = M('job');
    }
    
    //共通以外操作写在下面
}