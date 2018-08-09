<?php
namespace com\lnbei\html\core\data;
use com\lnbei\html\widget\Widget;
//内容迭代
class ContentIterator
{
    /**
     * 标签集合
     * @var array $tagArray
     */
    private $tagArray;
    /**
     * 构造函数
     */
    public function __construct($tagArray){
        $this->tagArray = $tagArray;
    }
    /**
     * 迭代函数
     * @param string $data_array
     * @param int $id
     * @param string $tag
     * @param ContentIteratorCallback $contentIteratorCallback
     */
    private function iteration($data_array, $id, $tag = '',$contentIteratorCallback){
    
        $tags = "";
        if(!isset($data_array[$id])){
            return $tags;
        }
        $int_count = count($data_array[$id]);
        $data_arrays = $data_array[$id];
        for($i = 0; $i < $int_count; $i++){
            $tags ='';
            if(@$data_array[''.$data_arrays[$i]['id']] == null){
                $tags = $contentIteratorCallback->callback($data_arrays[$i],$g = '',true);
            }
            else {
                $tags = self::iteration($data_array, ''.$data_arrays[$i]['id'], '' ,$contentIteratorCallback);
                $tags = $contentIteratorCallback->callback($data_arrays[$i],$tags,false);
            }
            $tag = $tag . $tags;
        }
        return $tag;
    }
    /**
     * 执行迭代函数
     * @param ContentIteratorCallback $contentIteratorCallback
     * @return string
     */
    public function runIteration($contentIteratorCallback,$pid = 0){
        $tag = '';
        return self::iteration($this->tagArray, $pid, $tag ,$contentIteratorCallback);
    }
    /**
     * 执行迭代函数
     * @param ContentIteratorCallback $contentIteratorCallback
     * @return string
     */
    public function runContentIteration($contentIteratorCallback,$pid = 0){
        $tag = '';
        return self::iterationContent($this->tagArray, $pid, $tag ,$contentIteratorCallback);
    }
    /**
     * 迭代函数
     * @param string $data_array
     * @param int $id
     * @param string $tag
     * @param ContentIteratorCallback $contentIteratorCallback
     */
    private function iterationContent($data_array, $id, $tag = '',$contentIteratorCallback){
    
        $tags = "";
        if(!isset($data_array[$id])){
            return $tags;
        }
        $int_count = count($data_array[$id]);
        $data_arrays = $data_array[$id];
        for($i = 0; $i < $int_count; $i++){
            $tags ='';
            $tempTagObject = @$data_arrays[$i];
            $flog = false;
            $tempID = '';
            if($tempTagObject instanceof  Widget){
                $flog = true;
            }else{
                $tempID = $tempTagObject->getSid();
            }
           
            if(@$data_array[''.$tempID] == null || $flog){
                
                $tags = $contentIteratorCallback->callback($data_arrays[$i],$g = '',true);
            }
            else {
                $tags = self::iterationContent($data_array, ''.$tempID, '' ,$contentIteratorCallback);
                $tags = $contentIteratorCallback->callback($data_arrays[$i],$tags,false);
            }
            $tag = $tag . $tags;
        }
        return $tag;
    }
    /**
     * 返回标签集合
     */
    public function getTagArray(){
        return $this->tagArray;
    }

}

?>