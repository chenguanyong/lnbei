<?php
namespace com\lnbei\html\core\data\content;

use com\lnbei\html\core\data\Content;
class WidgetContent implements Content
{
    /**
     * 标签集合
     * @var unknown
     */
    private $tagArray;
    /**
     * 构造函数
     * @param array $tagArray
     */
    public function __construct($tagArray=array()){
        $this->tagArray = $tagArray();
    }
    /**
     * 迭代函数
     * @param array $data_array
     * @param string $id
     * @param string $tag
     */
    private function iteration($data_array, $id, $tag = ''){
        $tags = "";
        if(!isset($data_array[$id])){
            return $tags;
        }
        $int_count = count($data_array[$id]);
        $data_arrays = $data_array[$id];
        for($i = 0; $i < $int_count; $i++){
            $tags ='';
            if(@$data_array[''.$data_arrays[$i][0]] == null){
                $tags = self::callback($data_arrays[$i],$g = '',true);
            }
            else {
                $tags = self::iteration($data_array, ''.$data_arrays[$i][0], '' );
                $tags = self::callback($data_arrays[$i],$tags,false);
            }
            $tag = $tag . $tags;
        }
        return $tag;
    }
    /**
     * 创建html
     */    
    public function buildHtml(){
        $tag = '';
        return self::iteration($this->tagArray, 0, $tag);
    }
    /**
     * 回调函数
     * @param array $tagobj
     * @param string $tags
     * @param boolean $bool
     */
    private function callback($tagobj,$tags,$bool){
        $tagobj->content = $tags;
        return  $tagobj->reDraw();
    }
}

?>