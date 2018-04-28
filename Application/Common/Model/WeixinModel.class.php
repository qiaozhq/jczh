<?php
namespace Common\Model;
use Think\Model;

class WeixinModel extends  Model {
    public function __construct() {
        // $this->_db = M('menu');
    }
   
   //接受事件推送并回复
    public function reposeMsg($postObj){
        switch ($postObj->MsgType) {
            case 'text'://文本
                $toUser =$postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time = time();
                // if(strpos($postObj->Content,"imooc") !== false ){
                    $msgType = "text";
                    $content = "Hello 您好！您可以通过以下方式和我们取得联系。\n邮 箱： zhangq@zyxy88.com\n电 话： 400-697-6977";
                    $template = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                </xml>";
                    $info = sprintf($template,$toUser,$fromUser,$time,$msgType,$content);
                // }               
                break;
             case 'image'://图片
                # code...
                break;
             case 'voice'://语音
                # code...
                break;
             case 'video'://视频
                # code...
                break; 
             case 'shortvideo'://小视频
                # code...
                break;
             case 'link'://链接
                # code...
                break;  
             case 'event'://事件
                if(strtolower($postObj->Event)=="subscribe"){//关注
                    $toUser =$postObj->FromUserName;
                    $fromUser = $postObj->ToUserName;
                    $time = time();
                    $msgType = "text";
                    $content = "Hello 你好！欢迎关注众赢新业N+N超值go！\n邮 箱： zhangq@zyxy88.com\n电 话： 400-697-6977";
                    $template = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                </xml>";
                    $info = sprintf($template,$toUser,$fromUser,$time,$msgType,$content);
                // }    
                    // $toUser =$postObj->FromUserName;
                    // $fromUser = $postObj->ToUserName;
                    // $time = time();
                    // $msgType = "news";
                    // $arr = array(
                    //         array(                        
                    //             'title'=>"欢迎来到众赢新业",
                    //             "description"=>"imooc is very cool",
                    //             'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
                    //             'url'=>"http://www.e-luo.xyz/weixin.php?c=about"),
                    //         array(                        
                    //             'title'=>"庄河分公司开业",
                    //             "description"=>"imooc is very cool",
                    //             'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
                    //             'url'=>"http://www.e-luo.xyz/weixin.php?c=about"),
                    //         array(                        
                    //             'title'=>"营口分公司开业",
                    //             "description"=>"imooc is very cool",
                    //             'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
                    //             'url'=>"http://www.e-luo.xyz/weixin.php?c=about"),
                    //         array(                        
                    //             'title'=>"吉林分公司开业大吉",
                    //             "description"=>"imooc is very cool",
                    //             'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
                    //             'url'=>"http://www.e-luo.xyz/weixin.php?c=about"),
                    //          array(                        
                    //             'title'=>"欢迎北京的朋友来考察",
                    //             "description"=>"imooc is very cool",
                    //             'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
                    //             'url'=>"http://www.e-luo.xyz/weixin.php?c=about"),                                                                                                                           
                    // );
                    // $template = "<xml>
                    //     <ToUserName><![CDATA[%s]]></ToUserName>
                    //     <FromUserName><![CDATA[%s]]></FromUserName>
                    //     <CreateTime>%s</CreateTime>
                    //     <MsgType><![CDATA[%s]]></MsgType>
                    //     <ArticleCount>".count($arr)."</ArticleCount>
                    //     <Articles>";

                    // foreach ($arr as $key => $value) {
                    //     $template .="
                    //         <item>
                    //         <Title><![CDATA[".$value['title']."]]></Title> 
                    //         <Description><![CDATA[".$value['description']."]]></Description>
                    //         <PicUrl><![CDATA[".$value['picUrl']."]]></PicUrl>
                    //         <Url><![CDATA[".$value['url']."]]></Url>
                    //         </item>";
                    // }
                    // $template .="    
                    //     </Articles>
                    //     </xml>";
                    // $info = sprintf($template,$toUser,$fromUser,$time,$msgType);            
                }
                # code...
                break;                                               
            default:
                # code...
                break;
        }
        return $info;
    }

    public function getWxAccessToken(){
        $appid = "wx04a2d6854276f85f";
        $appSecret = "e37cb9376de5c89595b6321e6388853d";
        //1 请求url地址
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid ."&secret=".$appSecret;
        //2 初始化
        $ch = curl_init();
        //3 设置参数
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //4 调用接口
        $res =curl_exec($ch);
        //5 关闭
        curl_close($ch);
        if(curl_errno($ch)){
            var_dump(curl_errno($ch));
        }
        $arr = json_decode($res,true);
        var_dump($arr);
    }

    
    public function getWxServerIp(){
        $accessToken = "ozDaaFCx1JWIThAtHvJeC-o-LVsNGPITH9zbukjh2lKK1mwLKfkHUaUm1MkhZjkeJ8p0QWEJe6aVAX4e-WvapyZ_RDolRHFWALGlCdalyhevrwTwMMrwpdcb-uQHHVEjEAGaADATPV";
        $url ="https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=".$accessToken;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        if(curl_errno($ch)){
            var_dump(curl_errno($ch));
        }
        $arr = json_decode($res,true);
        echo "<pre>";
        var_dump($arr);
        echo "</pre>";
    }



}