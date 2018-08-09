<?php
namespace com\lnbei\codebuilder\js;

class CreateJSImp implements JSImp
{
    /**
     * 
     * @var BaseJsImp
     */
    protected $js;
    public function __construct($data, $controllerName, $configView){
        $this->js = new AceJs($data, $controllerName, $configView);
    }
    /**
     * 创建js
     * {@inheritDoc}
     * @see \com\lnbei\codebuilder\js\JSImp::createJS()
     */
    public function createJS(){
        $str = $this->js->createJS();
        return $str;
    }
}

?>