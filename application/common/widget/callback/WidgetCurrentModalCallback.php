<?php
namespace app\common\widget\callback;

interface WidgetCurrentModalCallback
{
    public function getWidgetFileByUserID($where);//查询
    public function addWidgetFileByUserID($data);//添加
    public function updateWidgetFileByUserID($data,$where);//更新
    public function getwidgetFileByPid($where, $page, $pageSize);//获取widgetFile文件列表通过父id

}

?>