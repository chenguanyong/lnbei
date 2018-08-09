<?php
namespace com\lnbei\html\core\tool;

class ArrayIterator
{
    private $array;
    public function __construct($array){
        $this->array = $array;
    }
    private function iterator($data_array, $id, $tag = '',$arrayIteratorCallbaack){
        $tags = "";
        if(!isset($data_array[$id])){
            return $tags;
        }
        $int_count = count($data_array[$id]);
        $data_arrays = $data_array[$id];
        for($i = 0; $i < $int_count; $i++){
            $tags ='';
            if(@$data_array[''.$data_arrays[$i]['id']] == null){
                $tags = $arrayIteratorCallbaack->callback($data_arrays[$i],$g = '',true);
            }
            else {
                $tags = self::iterator($data_array, ''.$data_arrays[$i]['id'], '' ,$arrayIteratorCallbaack);
                $tags = $arrayIteratorCallbaack->callback($data_arrays[$i],$tags,false);
            }
            $tag = $tag . $tags;
        }
        return $tag;
    }
    public function getIterator($id,ArrayIteratorCallback $arrayIteratorCallbaack){
       
        return self::iterator($this->array, $id, $tag='', $arrayIteratorCallbaack);
    }
}

?>