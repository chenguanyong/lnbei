<?php
namespace com\lnbei\wechat\base;
use com\lnbei\think\Cache;
class JSSDK {
  private $appId;
  private $appSecret;

  public function __construct($appId, $appSecret) {
    $this->appId = $appId;//="wx35c8194a12ccf1b9";
    $this->appSecret = $appSecret;//="519c69f2655b229a6c1f2f5e349ab9a6";
  }

  public function getSignPackage() {
    $jsapiTicket = $this->getJsApiTicket();
	//exit;

    // 注意 URL 一定要动态获取，不能 hardcode.
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $timestamp = time();
    $nonceStr = $this->createNonceStr();

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

    $signature = sha1($string);

    $signPackage = array(
      "appId"     => $this->appId,
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
    return $signPackage; 
  }

  protected function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }

  protected function getJsApiTicket() {
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode($this->get_php_file("jsapi_ticket.php"));
    if ($data->expire_time < time()) {
      $accessToken = $this->getAccessToken();
      // 如果是企业号用以下 URL 获取 ticket
      // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
      $res = json_decode($this->httpGet($url));
      $ticket = $res->ticket;
      if ($ticket) {
        $data->expire_time = time() + 7000;
        $data->jsapi_ticket = $ticket;
        $this->set_php_file("jsapi_ticket.php", json_encode($data));
      }
    } else {
      $ticket = $data->jsapi_ticket;
    }

    return $ticket;
  }
 //获取AccessToken
 protected  function getAccessToken() {
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
     $data = Cache::get('AccessToken');
     if ($data == null ||$data["expire_time"] < time()) {
      // 如果是企业号用以下URL获取access_token
      $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
       //$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
	  $rr = $this->httpGet($url);
      $res = json_decode($rr,true);
	  $data = array();
	
	  if(!isset($res['access_token'])){
	      Cache::set('AccessToken',null);
	      return null;
	  }
      $access_token = $res['access_token'];
      if ($access_token) {
        $data['expire_time'] = time() + 7000;
        $data['access_token'] = $access_token;
        Cache::set('AccessToken',$data,7800);
      }else{
          Cache::set('AccessToken',null);
      }
    } else {
      $access_token = $data['access_token'];
    }
    return $access_token;
  }

  protected function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
	 if($res === FALSE ){
        return curl_error($ch);
     }
    curl_close($curl);
    return $res;
  }

  protected function get_php_file($filename) {
     // echo trim(substr(file_get_contents($filename), 15));
    return trim(substr(file_get_contents($filename)));
  }
  protected function set_php_file($filename, $content) {
    $fp = fopen($filename, "w");
    fwrite($fp, "<?php exit();?>" . $content);
    fclose($fp);
  }
  //curl post方式发送
  public function sendPost($data,$url){
      //echo $url;
      $data_string = json_encode($data,JSON_UNESCAPED_UNICODE);
      //var_dump($data_string);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($data_string))
          );
      $result = curl_exec($ch);
      if($result === FALSE ){
          curl_close($ch);
          return false;
      }
      curl_close($ch);//关闭curl句柄
      $rr = json_decode($result);
      if($rr->errcode=="0"){
          return $rr;
      }else{
          return null;
      }
  }
    //curl post方式发送
  public function Post_user_ticket($data,$url){
      //echo $url;
      $data_string = json_encode($data,JSON_UNESCAPED_UNICODE);
      //var_dump($data_string);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($data_string))
          );
      $result = curl_exec($ch);
      if($result === FALSE ){
          curl_close($ch);
          return false;
      }
      curl_close($ch);//关闭curl句柄
      $rr = json_decode($result);
          return $rr;
  }
  //发送get请求
  public function sendGet($url){
      
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_TIMEOUT, 500);
      // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
      // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_URL, $url);
      //echo curl_error($curl);
      $res = curl_exec($curl);
      if($res === FALSE ){
          return false;
      }
      curl_close($curl);
      $rr = json_decode($res);
      if($rr == null){
          if($rr->errcode=="0"){
              return true;
          }else{
              return $rr;
          }
      }else{
          return $rr;
      }
  }
  public function sendFile($url,$filename){
     # $url="http://youraddress.tld/example/upload.php";
      // Create a CURLFile object / procedural method
      $cfile = curl_file_create($filename,'multipart/form-data'); // try adding
      //echo $filename;
      $imgdata = array('media' => $cfile);
      //var_dump($imgdata);
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
     // curl_setopt($curl, CURLOPT_USERAGENT,'Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.15');
     // curl_setopt($curl, CURLOPT_HTTPHEADER,array('User-Agent: Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.15','Referer: http://someaddress.tld','Content-Type: multipart/form-data'));
      //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // stop verifying certificate
//       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//       curl_setopt($curl, CURLOPT_POST, true); // enable posting
//       curl_setopt($curl, CURLOPT_POSTFIELDS, $imgdata); // post images
//       curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // if any redirection after upload
     // curl_setopt ( $ch1, CURLOPT_URL, $url );
     //$rs = json($imgdata);
      curl_setopt ( $curl, CURLOPT_POST, 1 );
      curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
      curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, 5 );
      curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
      curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
      curl_setopt ( $curl, CURLOPT_POSTFIELDS, $imgdata );
      $r = curl_exec($curl);
      //echo curl_error($curl);
      //var_dump($r);
      curl_close($curl);
      if($r === FALSE ){
          return false;
      }
      $rr = json_decode($r);
      if($rr == null){
          if(@$rr->errcode=="0"){
              return true;
          }else{
              return $rr;
          }
      }else{
          return $rr;
      }
  }
}

