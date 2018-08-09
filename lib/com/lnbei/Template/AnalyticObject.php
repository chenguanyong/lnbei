<?php
//解析从模板中产生的信息
namespace com\lnbei\Template;
class AnalyticObject{

    private $model ;//模板类型
    private $size ; //请求数据大小
    private $dataid;//分类id
    private $object;//数据对象
    private $doc;//文档处理
    private $html;//文本
    public function getMode(){
        return $this->model;
    }
    public function __construct($data_array, $html){

        $this->model = '0';
        $this->size = '0';
        $this->dataid = '0';
        $this->object = $data_array;
        $this->html = $html;
        $return = self::init();
        if($return == false){

            throw new Exception();
        }
    }
    //初始化domMocument
    private function init(){

        $this->doc = new DOMDocument;
        $this->doc->encoding="utf-8";
        return  $return = @$this->doc->loadHTML($this->html);

    }
    //生成求数据的信息
    public function BuildRequest($data_array){

        if(isset($data_array['model'])){

            $this->model = $data_array['model'];//模块类型
        }
        if(isset($data_array['size'])){

            $this ->size = $data_array['size'];//数据大小
        }
        if(isset($data_array['dataid'])){

            $this->dataid = $data_array['dataid'];
        }

        switch($this->model){

            case '0': return false;
            case '1':"dsd";break;
        }
        $request = '';
        return $request;
    }
    //解析
    private function Analytic($datas = array()){

        //第一层对象
        foreach ($this->object as $key=>$value){

            $str = self::BuildRequest($value[0]);
            if($this->model == '0'){
                $data = $datas ;
                if(count($data) == 0){

                    return false;
                }
            }else{

                $data = self::getRemote($str);
            }
            $int_cont = count($value);

            for($i = 1; $i < $int_cont; $i++){

             self::chilenObject($value[$i], $data, $this->doc);

            }
        }
    }
    //设置模式
    public function setMode($int_mode){
               
        $this->model = $int_mode;
    }
    //处理善后
    public function Aftermath(){
        $txt = $this->doc->saveHTML();
        $patten_information = '/div_class=\"([.\S\s]*?)\"/i';//去除字符串中无用字符
        $result = preg_replace($patten_information, " ", $txt);
        if(is_array($result) || $result == null){

            $result = fasle;
        }

        return $result;
    }
    //处理子对象
    private function chilenObject($data, $datas = null, $doc=null ){
        $id = null;
        $class = null;
        $size = null;
        $fun = null;
        if(isset($data['id'])){

            $id = $data['id'];//模块类型
            unset($data['id']);
        }
        if(isset($data['class'])){

            $class = $data['class'];//模块类型
            unset($data['class']);
        }
        if(isset($data['fun'])){

            $fun = $data['fun'];//模块类型
            unset($data['fun']);
        }
        if(isset($data['size'])){

            $size = $data['size'];//模块类型
            unset($data['size']);
        }
        $last_data_array = array_values($data);
        
        if(!is_array($datas)){
            
            $back_data = array($datas);
            
        }
        $$back_data = $datas;
        $fun($id, $class, $size, $back_data, $doc, $last_data_array);

    }
    //获取远程数据
    public function getRemote($request){


        return $array=array();
    }

    public function run($data=array()){

        self::Analytic($data);

        return self::Aftermath();

    }
    //析构函数
    function __destruct(){

        $this->doc = null;

    }
    //

}
