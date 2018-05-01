<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
class IndexController extends CommonController {
    public function index(){
    	$users = D("User")->getUsers();
        $this->assign('users', $users);
		$products = D("Product")->getProducts();
        $this->assign('products', $products);
		$jobs = D("Job")->getJobs();
        $this->assign('jobs', $jobs); 
        $this->display();
    }
}