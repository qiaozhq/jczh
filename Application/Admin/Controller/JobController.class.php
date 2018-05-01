<?php
/**
 * 新闻管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class JobController extends CommonController {
    //新闻管理首页
    public function index() {
        $jobs = D("Job")->getJobs();
        $this->assign('jobs',$jobs);
        $this->display();
    }

    //添加/修改新闻
    public function add(){
        if($_POST) {
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0,'职位名称不能为空');
            }
            if($_POST['job_id']) {
                return $this->save($_POST);
            }
            $id = D("Job")->insert($_POST);
            if($id) {
                return show(1,'新增成功',$id);
            }
            return show(0,'新增失败',$id);
        }else {
            $this->display();
        }
    }

    //取得要修改的新闻数据
    public function edit() {
        $id = $_GET['id'];
        $job = D("Job")->find($id);
        $this->assign('job', $job);
        $this->display();
    }

    //修改新闻
    public function save($data) {
        $id = $data['job_id'];
        unset($data['job_id']);
        try {
            $result = D("Job")->updateMenuById($id, $data);
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
        return parent::setStatus($_POST,'Job');
    }

    //分类排序处理
    public function listorder() {
        return parent::listorder('Job');
    }
}