<?php
/**
 * 公用的方法
 */
//textarea中的换行符号转换成html的换行符号
function formatwork($str){
   return str_replace("\r\n","<br>",$str);
}
//后端处理结果以json形式向前端返回
function  show($status, $message,$data=array()) {
    $reuslt = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );
    exit(json_encode($reuslt));
}
function create_time($t) {
    return date("Y-m-d H:i:s",$t);
}
function getMd5Password($password) {
    return md5($password . C('MD5_PRE'));
}
function getMenuType($type) {
    return $type == 1 ? '后台分类' : '前端导航';
}
function getParentMenuName($parentid,$menus=array()) {
    $ret = '无';
    foreach ($menus as $m) {
        if($m['menu_id'] == $parentid){
            $ret = $m['name'];
        }
    }
    return $ret;
}
function status($status) {
    if($status == 0) {
        $str = '禁用';
    }elseif($status == 1) {
        $str = '启用';
    }elseif($status == -1) {
        $str = '删除';
    }
    return $str;
}
//文件上传处理结果以json形式向前端返回
function showKind($status,$data) {
    header('Content-type:application/json;charset=UTF-8');
    if($status==0) {
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}
function getLoginUsername() {
    return $_SESSION['adminUser']['username'] ? $_SESSION['adminUser']['username']: '';
}