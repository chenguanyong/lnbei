<?php
namespace com\lnbei\html\core\config;
/**
 * 系统控制命令类
 * @author Administrator
 *
 */
class ControlCommand
{
    /**
     * 生成静态页面或动态页面
     * 1：动态0：静态
     */
    public static $isStatic = 0;
    
    /**
     * 是否显示UUID
     * 1:保留0:隐藏
     */
    public static $isShowID = 1;
    /**
     * 是否显示父UUID
     * 1:保留0:隐藏
     */
    public static $isShowParentID = 1;
}

?>