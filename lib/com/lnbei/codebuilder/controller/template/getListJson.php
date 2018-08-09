<?php
return <<<'xml'
     $query_data = input("get.");
     $model = $this->model;
     $where = array();
     $result = $model->getList($where,$query_data[$this->iDisplayStart],$query_data[$this->iDisplayLength]);
     if($result == null){
        return json(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0]);
    }
    return json(['draw'=>$query_data['sEcho'],'recordsTotal'=>$result['length'],'recordsFiltered'=>$result['length'],'data'=>$result['data']]);   
xml;
