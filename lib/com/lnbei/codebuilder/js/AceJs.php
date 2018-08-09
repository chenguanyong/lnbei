<?php
namespace com\lnbei\codebuilder\js;

use com\lnbei\file\File;
use com\lnbei\codebuilder\Config;
use com\lnbei\codebuilder\view\ViewType;
class AceJs implements BaseJsImp
{
    /**
     * DataTable插件配置文件
     * @var array
     */
    private $dataTable;
    /**
     * 表字段集合
     * @var array
     */
    private $data;
    /**
     * 表单验证配置
     * @param array $ruleConfig
     */
    private $ruleConfig;
    /**
     * 控制器数据
     * @param array $data
     */
    private $controllerData;
    /**
     * js模板内容
     * @var string $jsFileData
     */
    private $jsFileData;
    /**
     * 模态框配置
     * @var array
     */
    private $modalView;
    /**
     * 控制器名称
     * @var string
     */
    private $controllerName;
    public function __construct($data, $controllerName, $configView){
        var_dump($data);
        $this->data = $data[$controllerName];
        $this->dataTable = array();
        $this->controllerName = $controllerName;
        $this->ruleConfig["rules"] = array();
        $this->ruleConfig["messages"] = array();
        $this->modalView = $configView;
        if(is_file(Config::$dataArray["View"]["MainViewJs"])){
            $this->jsFileData = File::fReadContex(Config::$dataArray["View"]["MainViewJs"]);//读取数据
        }else{
            throw new \Exception("js模板打不开");
        }
        self::__init();//初始化表格配置文件
        self::createColumns();//创建表格配置文件
        self::initRuleConfig();//初始化表单验证配置文件
        self::initController();
        echo "<textarea>" .$this->jsFileData . "</textarea>";
        var_dump($this->jsFileData);
        //exit();
    }
    /**
     * 创建js代码
     * {@inheritDoc}
     * @see \com\lnbei\codebuilder\js\BaseJsImp=>=>createJS()
     */
    public function createJS(){
        
        $pattern = '/@DATATABLECONFIG@/i';//替换表格插件的配置文件
        $replacement = json_encode($this->dataTable);
        
        $this->jsFileData = preg_replace($pattern, $replacement, $this->jsFileData);
        self::doRule();
        echo "<textarea>" . $this->jsFileData . "</textarea>";
       // exit();
        return $this->jsFileData;
    }
    
    public function __init(){
        $this->dataTable = array(
            "columns" => [
      
            ],
            "columnDefs" => [
            [
                "orderable" => false,
                "targets" => 0,
                "data" => null,
                "defaultContent" => "<label class='pos-rel'><input type='checkbox' class='ace' /><span class='lbl'></span></label>"
            ],
            [
                "orderable" => false,
                "targets" => (count($this->data)+1),
                "data" => null,
                "defaultContent" => "<a data-type='1' data-whatever='修改角色' class='btn btn-success btn-xs'><i class='fa fa-edit'></i> 修改</a><a  data-type='1' data-whatever='删除角色' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> 删除</a>"
            ],
            [
                "targets"=> (count($this->data)),
                "visible"=> false,
                "searchable"=> false
            ],
            ],
            "drawCallback" => "function (settings)  {}",
            "language"=> [
            "sProcessing"=> "处理中...",
            "sLengthMenu"=> "显示 _MENU_ 项结果",
            "sZeroRecords"=> "没有匹配结果",
            "sInfo"=> "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
            "sInfoEmpty"=> "显示第 0 至 0 项结果，共 0 项",
            "sInfoFiltered"=> "(由 _MAX_ 项结果过滤)",
            "sInfoPostFix"=> "",
            "sSearch"=> "搜索=>",
            "sUrl"=> "",
            "sEmptyTable"=> "表中数据为空",
            "sLoadingRecords"=> "载入中...",
            "sInfoThousands"=> ",",
            "oPaginate"=> [
            "sFirst"=> "首页",
            "sPrevious"=> "上页",
            "sNext"=> "下页",
            "sLast"=> "末页"
            ],
            "oAria"=> [
            "sSortAscending"=> ": 以升序排列此列",
            "sSortDescending"=> ": 以降序排列此列"
            ]
            ]
            ,
            "bProcessing" => true,
            "bServerSide" => true,
            "sAjaxSource" => "",//"{$Think.config.__PUBLIC__}/index/Department/getDepar?id=0",
        );
        $this->dataTable["columns"][] = array("data"=>"","title"=>"全选"); 
    }
    /**
     * 创建表格字段
     */
    public function createColumns(){
        $i = count($this->dataTable["columns"]);
        var_dump($this->data);
        foreach ($this->data as $key=>$value){
            $this->dataTable["columns"][$i]["data"] = empty($key)?"":$key;//字段名
            $this->dataTable["columns"][$i]["title"] =empty($value["COLUMN_COMMENT"])?"字段名":$value["COLUMN_COMMENT"];//注释
            $this->dataTable["columns"][$i]["orderable"] = empty($value["orderable"])?false:true;//排序
            $i++;
        }
        $this->dataTable["columns"][] = array("data"=>"","title"=>"全选");
         var_dump($this->dataTable);
    }
    /**
     * 创建表单验证配置文件
     */
    public function initRuleConfig(){
      
        foreach ($this->data as $key=>$value){
            $this->ruleConfig["rules"][$key] = array("required"=>true);
            $this->ruleConfig["messages"][$key] = array("required"=>"不能为空");
        }
    }
    /**
     * 初始化控制器数据
     */
    private function initController($controllerData = array()){
        
        //相应的模态框名称
        $this->controllerData = array(
            ViewType::CModular=>$controllerData[ViewType::CModular] = Config::$dataArray["Module"],//模块名
            ViewType::CName=>$controllerData[ViewType::CName] = $this->controllerName,
            ViewType::EDITVIEW=>$controllerData[ViewType::EDITVIEW] = $this->modalView[ViewType::EDITVIEW]["name"],
            ViewType::DELEVIEW=>$controllerData[ViewType::DELEVIEW] = $this->modalView[ViewType::DELEVIEW]["name"],
            ViewType::LOOKVIEW=>$controllerData[ViewType::LOOKVIEW] = $this->modalView[ViewType::LOOKVIEW]["name"],
            ViewType::ADDVIEW=>$controllerData[ViewType::ADDVIEW] = $this->modalView[ViewType::EDITVIEW]["name"],   
        );
        var_dump($this->controllerData);
        //exit();
    }
    /**
     * 处理表单验证函数
     */
    protected function doRule(){
       // echo "----------------------------------------------->";
        //var_dump($this->modalView);
        foreach($this->modalView as $key=>$value){
            //var_dump($value);
            //exit;
            self::replaceRule($value["name"]);
        }
       // echo "<------------------------------------------------";
       // exit;
    }
    protected function replaceRule($optionName){
       // submitHandler
       /**
        * 替换回调函数
        */
        echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++>";
        var_dump($optionName);
        $this->ruleConfig["submitHandler"] = $optionName . "ValidatorRuleCallbackFun";//配置处理函数
        $ruleConfigJson = json_encode($this->ruleConfig);
        $pattern = '/@'.$optionName.'ValidatorRuleConfig@/i';//替换表格插件的配置文件
        $this->jsFileData = preg_replace($pattern, $ruleConfigJson, $this->jsFileData);
      
        //CAddValidatorRuleCallbackUrl
        /**
         * 替换URL
         *
         */
        $url = $this->controllerData["CModular"] . "/" . $this->controllerData["CName"] . "/" . $this->controllerData[$optionName];
        $pattern = '/@'.$optionName.'ValidatorRuleCallbackUrl@/i';//替换表格插件的配置文件
        $this->jsFileData = preg_replace($pattern, $url, $this->jsFileData);
        //CEditSubmintModal  SubmintModal
        //echo "<textarea>" . $this->jsFileData . "</textarea>";
        //exit();
        /**
         *替换模态框 ID
         * 
         */
      echo  $modalId = $this->controllerData[$optionName];
      var_dump($modalId);
      //exit();
     echo   $pattern = '/@'.$optionName.'SubmintModal@/i';//替换表格插件的配置文件
        $this->jsFileData = preg_replace($pattern, $modalId, $this->jsFileData);
        echo "<textarea>" . $this->jsFileData . "</textarea>";
        //exit();
    }
    
}

?>