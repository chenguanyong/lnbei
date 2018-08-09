<?php
namespace app\web\controller;

use app\common\controller\Base;
use app\web\model\article\ArticleModel;
class Article extends Base
{
    public function index(){

        //$key = input('key');
        $holderid = input("hid");
        if($holderid == null || input('page')==null){
            return $this->fetch();
        }
        if($holderid == null||!is_numeric($holderid)){
            $holderid = 0;
        }
        $map = "ce_article_cate.id = " . $holderid;

        $Nowpage = input('page') ? input('page'):1;

        $limits = 10;// 获取总条数
        $start = $limits * ($Nowpage - 1);
        $article = new ArticleModel();
        $count = $article->getArticleCount($map);//计算总页面
        

        $allpage = ceil($count / $limits);
        
        $lists = $article->getArticleList($map, $start, $limits);

        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count', $count);
        //$key=null;
        $this->assign('val', $holderid);
        if(input('page')){
           $data = array();
           //var_dump($lists);
           foreach ($lists as $key=>$value){
               $data[$key]['id']=$value['id'];
               $data[$key]['title']=$value['title'];
               $data[$key]['cate_name']=$value['cate_name'];
               $data[$key]['image']=$value['image'];
               $data[$key]['browsecount']=$value['browsecount'];
               $data[$key]['downcount']=$value['downcount'];
               $data[$key]['create_time']=$value['create_time'];
               $data[$key]['update_time']=$value['update_time'];
               $data[$key]['IsDelete']=$value['IsDelete'];
           }
          
           
            return json($data);
        }
        return $this->fetch();
    }
    //shouye
    public function articleList(){
        
        return $this->fetch("articlelist");
    }
}

?>