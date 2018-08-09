<?php
namespace com\lnbei\html\test\core\content;

use com\lnbei\html\test\TestImp;
use com\lnbei\html\core\data\content\WidgetContent;
class WidgetContentTest implements TestImp
{
    private $widgetContent;
    public function __construct(){
        $tagArray = array();
        $this->widgetContent = new WidgetContent($tagArray);
    }
    public function test(){
        $temp = $this->widgetContent;
        echo 'success';
    }
    public static function run(){
        $widgetContent = new WidgetContentTest();
        $widgetContent->test();
    }
    public function getObject(){
        return $this->widgetContent;
    }
}

?>