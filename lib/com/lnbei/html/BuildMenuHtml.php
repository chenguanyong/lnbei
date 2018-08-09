<?php
namespace com\lnbei\html;

class BuildMenuHtml
{
    protected $data_array;
    public function __construct($data){
        
        $this->data_array = $data;
        //初始化
    }
    
    //设置数据
    public function setData($data){
        
        $this->data_array = $data;
    }
    
    //创建菜单
    public function buildMenu(){
      
        //迭代创建
      return  self::iteration($this->data_array, 0);
    }
    
    //迭代
    protected  function iteration($data_array, $id, $tag = ''){
        $tags = "";
        if(!isset($data_array[$id])){
             
            return $tags;
        }
        $int_count = count($data_array[$id]);
        $data_arrays = $data_array[$id];
    
        for($i = 0; $i < $int_count; $i++){
            $tags ='';
            if(@$data_array[''.$data_arrays[$i][0]] == null){
                $tags = self::create_tag($data_arrays[$i],$g = '',true);
            }
            else {
                $tags = self::iteration($data_array, ''.$data_arrays[$i][0], '' );
                $tags = self::create_tag($data_arrays[$i],$tags,false);
            }
            $tag = $tag . $tags;
        }
        return $tag;
    }
    protected $dataArray = array();
    //迭代
    
    protected  function iterations($data_array, $id){
        $tags = "";
        if(!isset($data_array[$id])){
             
            return $tags;
        }
        $int_count = count($data_array[$id]);
        $data_arrays = $data_array[$id];
    
        for($i = 0; $i < $int_count; $i++){
            
            if(@$data_array[''.$data_arrays[$i][0]] == null){
    
                $tags = self::create_Array($data_arrays[$i],$g = '',true);
            }
            else {
    
                $tags = self::iterations($data_array, ''.$data_arrays[$i][0], '' );
                $tags = self::create_Array($data_arrays[$i],$tags,false);
            }
    
            
        }
       return $tags;
    }
    
    public function getData(){
        
        self::iterations($this->data_array,0);
        return $this->dataArray;
    }
    
    //创建li字符串
  protected  function create_tag($data,$child = '',$flag = false){
     
     // $this->dataArray[]=$data;
        $str = '<li class=""><a data-url="'.$data['url'].'" href="' . $data['url'] . '"><i class="menu-icon fa fa-caret-right"></i>' .$data['title'] . '</a><b class="arrow"></b>';
        $strs = '<li class=""><a data-url="'.$data['url'].'" class="dropdown-toggle" href="' . $data['url'] . '"><i class="menu-icon fa fa-pencil-square-o"></i>' .$data['title'] . '<b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>';
        if($flag){
    
            return $str . '</li>';
            
        }else{
             
            return $strg = $strs . '<ul class="submenu">' .$child . '</ul></li>';
             
        }    
    }
    
    //创建li字符串
    protected  function create_Array($data,$child = '',$flag = false){
            $this->dataArray[]=$data;
    }
}

?>