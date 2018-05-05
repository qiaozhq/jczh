<?php
namespace Common\Model;
use Think\Model;

/**
 * 产品服务操作
 * @author  Alexander
 */
class ProductModel extends CommonModel {
    private $_db = '';
    
    public function __construct() {
        $this->_db = M('product');
    }
    
    //共通以外操作写在下面
}