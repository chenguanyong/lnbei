<?php
namespace app\web\model\article;

use think\Model;
class ArticleModel extends Model
{   
    protected $table = "ce_article";
    //获取文章列表
    public function getArticleList($where,$start,$num){
        return $this->join("ce_article_cate"," ce_article.cateid = ce_article_cate.id")->where($where)->page($start,$num)->order("ce_article.id desc")->select();
    }
    //获取文章数量
    public function getArticleCount($where){
        return $this->join("ce_article_cate"," ce_article.cateid = ce_article_cate.id")->where($where)->count();
    }
    //删除文章
    public function deleArticle($id){
        return $this->where("ID",$id)->delete();
    }
    //更新文章
    public function updateArticle($data,$id){
        return $this->save($data,["id"=>$id]);
    }
    //添加文章
    public function addArticle($data){
        return $this->save($data);
    }
}

?>