<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Session;
use think\Cache;
use Alidayu\AlibabaAliqinFcSmsNumSendRequest;
use Alidayu\TopClient;
use phpmailer\PHPMailer;
function CheckUser(){
    if(Session::has('UserName')){
        $username = Session::get('UserName');
    }else{
        return false;
    }
    $UserID = '';
    if(Session::has('UserID')){
        $UserID = Session::get('UserID');
    }else{
        return false;
    }
    if(empty($UserID)){
        return false;
    }else{
        return true;
    }
}

//获取系统配置信息
function getConfig($name,$companyID,$cityID){
    $data = Cache::get('SYSCONFIG_' . $companyID . "_" . $cityID);
    if($data == null){
        $result = Db::name("config")->where(["CompanyID"=>$companyID,"CityID"=>$cityID])->select();
        $temp = array();
        foreach ($result as $value){
            $temp[trim($value['name'])]=$value["value"];
        }
        Cache::set('SYSCONFIG_' . $companyID . "_" . $cityID,$temp,3600);
        return Cache::get('SYSCONFIG_' . $companyID . "_" . $cityID)[$name];
    }else {
        return $data[$name];
    }
}

/**
 * 发送短信
 *$autograph = "会员账号信息找回"
 * var_dump(sendSMS(array("name"=>"陈","zhanghao"=>"dsfakjfsa","product"=>"cheng","password"=>"sdfsa"),"15638202185","SMS_14350225"));
 */
function sendSMS($data=array(),$phone,$SMStemple,$autograph){
    if(count($data) == 0){
        return null;
    }
    $content = json_encode($data);
    $c = new TopClient;
    $c->appkey = getConfig("sms_appkey");//"23447179";  //App Key的值 这个在开发者控制台的应用管理点击你添加过的应用就有了
    $c->secretKey =getConfig("sms_secretKey");//"4bb5b8f16c66e4478dddb43986ca73a1"; //App Secret的值也是在哪里一起的 你点击查看就有了
    $req = new AlibabaAliqinFcSmsNumSendRequest;
    $req->setExtend("123456"); //这个是用户名记录那个用户操作
    $req->setSmsType("normal"); //这个不用改你短信的话就默认这个就好了
    $req->setSmsFreeSignName($autograph ); //这个是签名
    $req->setSmsParam($content); //这个是短信签名
    $req->setRecNum($phone); //这个是写手机号码
    $req->setSmsTemplateCode($SMStemple); //这个是模版ID 主要也是短信内容
    $resp = $c->execute($req);
    if($resp->err_code == 0){
        return $resp;
    }else{
        return null;
    }
}
/*发送邮件方法
 *@param $to：接收者 $title：标题 $content：邮件内容
 *@return bool true:发送成功 false:发送失败
 */
function sendMail($to,$title,$content){

    //实例化PHPMailer核心类
    $mail = new PHPMailer();

    //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    $mail->SMTPDebug = 1;

    //使用smtp鉴权方式发送邮件
    $mail->isSMTP();

    //smtp需要鉴权 这个必须是true
    $mail->SMTPAuth=true;

    //链接qq域名邮箱的服务器地址
    $mail->Host = 'smtp.qq.com';

    //设置使用ssl加密方式登录鉴权
    $mail->SMTPSecure = 'ssl';

    //设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
    $mail->Port = 465;

    //设置smtp的helo消息头 这个可有可无 内容任意
    // $mail->Helo = 'Hello smtp.qq.com Server';

    //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
    $mail->Hostname = 'localhost';

    //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
    $mail->CharSet = 'UTF-8';

    //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->FromName = 'changeSoft';

    //smtp登录的账号 这里填入字符串格式的qq号即可
    $mail->Username ='825307076@qq.com';

    //smtp登录的密码 使用生成的授权码（就刚才叫你保存的最新的授权码）
    $mail->Password = 'qrrpfklpwcdqbahi';

    //设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
    $mail->From = '825307076@qq.com';

    //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
    $mail->isHTML(true);

    //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
    $mail->addAddress($to,'注册通知');

    //添加多个收件人 则多次调用方法即可
    // $mail->addAddress('xxx@163.com','lsgo在线通知');

    //添加该邮件的主题
    $mail->Subject = $title;

    //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
    $mail->Body = $content;

    //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
    // $mail->addAttachment('./d.jpg','mm.jpg');
    //同样该方法可以多次调用 上传多个附件
    // $mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');

    $status = $mail->send();

    //简单的判断与提示信息
    if($status) {
        return true;
    }else{
        return false;
    }
}