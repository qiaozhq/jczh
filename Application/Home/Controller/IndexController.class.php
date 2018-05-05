<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
class IndexController extends CommonController {
    public function index(){
    	$users = D("User")->getHomeUsers();
        $this->assign('users', $users);
		$products = D("Product")->getHomeProducts();
        $this->assign('products', $products);
		$jobs = D("Job")->getHomeJobs();
        $this->assign('jobs', $jobs); 
        $this->display();
    }
}