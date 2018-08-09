<?php
return <<<'xml'
    $count = $this->where($where)->count($this->pk);
    $back_result = array();
    $i = 0;
    $result = $this->where($where)->limit($page,$rownum)->select();
    foreach ($result as $result_row){
        $back_result[$i] = $result_row;
        $i++;
    }
    return ['data'=> $back_result,'length' => $count];
xml
?>