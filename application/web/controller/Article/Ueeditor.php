<?php
namespace app\web\controller\Article;

use app\common\controller\Base;
use app\web\controller\comment\Ueconfig;
use Ueeditor\UEeditorOption;
class Ueeditor extends Base
{ 
    public function index(){
        $action = input("action");
        switch ($action) {
            case 'config':
                $result =  json(Ueconfig::$config);
               // var_dump($result);
                //exit;
                break;
        
                /* 上传图片 */
            case 'uploadimage':
                /* 上传涂鸦 */
            case 'uploadscrawl':
                /* 上传视频 */
            case 'uploadvideo':
                /* 上传文件 */
            case 'uploadfile':
                $ueeditor = new UEeditorOption();
                $result = $ueeditor ->upload();
                break;
        
                /* 列出图片 */
            case 'listimage':
                $ueeditor = new UEeditorOption();
                $result = $ueeditor ->getFileList();
                break;
                /* 列出文件 */
            case 'listfile':
                $ueeditor = new UEeditorOption();
                $result = $ueeditor ->getFileList();
                break;
        
                /* 抓取远程文件 */
            case 'catchimage':
                $ueeditor = new UEeditorOption();
                $result = $ueeditor ->getCrawler();
                break;
        
            default:
                $result = json_encode(array(
                'state'=> '请求地址出错'
                    ));
                break;
        }
        
        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                return  htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
               return  json_encode(array(
                    'state'=> 'callback参数不合法'
                ));
            }
        } else {
           return $result;
        }
        
    }
}

?>