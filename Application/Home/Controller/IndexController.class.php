<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
class IndexController extends CommonController {
    public function index(){
    	$users = D("User")->getHomeData('user', 'user_id');
        $this->assign('users', $users);
		$products = D("Product")->getHomeData('product', 'product_id');
        $this->assign('products', $products);
		$jobs = D("Job")->getHomeData('job', 'job_id');
        $this->assign('jobs', $jobs); 
        $this->display();
    }
}