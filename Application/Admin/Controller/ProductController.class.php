<?php
/**
 * 新闻管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class ProductController extends CommonController {
    //新闻管理首页
    public function index() {
        $products = D("Product")->getProducts();
        $this->assign('products',$products);
        $this->display();
    }

    //添加/修改新闻
    public function add(){
        if($_POST) {
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0,'标题不能为空');
            }
            if(!isset($_POST['description']) || !$_POST['description']) {
                return show(0,'简介不能为空');
            }
            if(!isset($_POST['thumb']) || !$_POST['thumb']) {
                return show(0,'必须有封面图片');
            }          
            if($_POST['product_id']) {
                return $this->save($_POST);
            }
            $id = D("Product")->insert($_POST);
            if($id) {
                return show(1,'新增成功',$id);
            }
            return show(0,'新增失败',$id);
        }else {
            $this->display();
        }
    }
    //添加/修改新闻
    public function addcontent(){
        if($_POST) {
            if($_POST['product_id']) {
                return $this->save($_POST);
            }
        }else {
            $this->display();
        }
    }

    //取得要修改的新闻数据
    public function edit() {
        $id = $_GET['id'];
        $product = D("Product")->find($id);
        $this->assign('product', $product);
        $this->display();
    }

    //取得要修改的新闻数据
    public function editcontent() {
        $id = $_GET['id'];
        $product = D("Product")->find($id);
        $this->assign('product', $product);
        $this->display();
    }

    //修改新闻
    public function save($data) {
        $id = $data['product_id'];
        unset($data['product_id']);
        try {
            $result = D("Product")->updateMenuById($id, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用新闻
    public function setStatus() {
        return parent::setStatus($_POST,'Product');
    }

    //分类排序处理
    public function listorder() {
        return parent::listorder('Product');
    }
}