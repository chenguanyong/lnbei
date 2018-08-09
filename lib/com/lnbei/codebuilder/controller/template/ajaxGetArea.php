<?php
return <<<'xml'
    
    $id = input("id");
    if($id == null){
        $id = 0;
    }
    $city = new AreaModel();
    $result = $city->getAreaList($id);
        $new_result=array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['ID'];
            $new_result[$k]['pId']=(int)$v['parentID'];
            $new_result[$k]['name']=$v['name'];
            //$new_result[$k]['iconSkin']=$v['css'];
            $new_result[$k]['isParent']=$city->isParent($v['ID']);
           // $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
           // $new_result[$k]['target'] = 'list_currency';
        }
    return json($new_result);
xml;
