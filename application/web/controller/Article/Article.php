<?php
namespace app\web\controller\Article;

use app\common\controller\Base;
use app\web\model\article\ArticleModel;
class Article extends Base
{
    //文章列表
    public function index(){
        
      return $this->fetch("articlelist");  
    }
    //添加文章
    public function addArticle(){
      
        if(request()->isAjax()){
            $data = input("post.");
            if($data == null){
                return json(array("code"=>0,"msg"=>"参数无效"));
            }
            $article = new ArticleModel();
            $result = $article->addArticle($data);
            if($result == null){
                return json(array("code"=>0,"msg"=>"添加失败"));
            }else{
                return json(array("code"=>1,"msg"=>"添加成功"));
            }
        }else{
            return json(array("code"=>0,"msg"=>"不是ajax请求"));
        }
    }
    //删除文章
    public function deleArticle(){
        if(request()->isAjax()){
            $articleID = input("post.id");
            if($data == null){
                return json(array("code"=>0,"msg"=>"参数无效"));
            }
            $article = new ArticleModel();
            $result = $article->deleArticle($articleID);
            if($result == null){
                return json(array("code"=>0,"msg"=>"删除失败"));
            }else{
                return json(array("code"=>1,"msg"=>"删除成功"));
            }
        }else{
            return json(array("code"=>0,"msg"=>"不是ajax请求"));
        }        
    }
    //更新文章
    public function updateArticle(){
        if(request()->isAjax()){
            $data = input("post.");
            
            if($data == null){
                return json(array("code"=>0,"msg"=>"参数无效"));
            }
            $article = new ArticleModel();
            $result = $article->updateArticle($data, $id=0);
            if($result == null){
                return json(array("code"=>0,"msg"=>"更新失败"));
            }else{
                return json(array("code"=>1,"msg"=>"更新成功"));
            }
        }else{
            return json(array("code"=>0,"msg"=>"不是ajax请求"));
        }       
    }
    
}

?>