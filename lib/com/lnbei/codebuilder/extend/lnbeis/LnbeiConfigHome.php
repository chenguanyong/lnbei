<?php
return [
            "db"=>
                [
                    "drive"=>"think",
                    "database"=>"ce",
                ],
            "NAMESPACEDIR"=>__DIR__."\\"."../../../../../",//命名空间目录
            "TOOLDIR"=>__DIR__."\\"."../../../../../",
            "TAGPATH"=>"G:/linbei/root/phpace_dev/lib/com/lnbei/html/tag/xml/tag.cfg.xml",
            "TAGCSSPATH"=>"G:/linbei/root/phpace_dev/lib/com/lnbei/html/core/data/css/xml/css.cfg.xml",
            "TAGATTRPATH"=>"G:/linbei/root/phpace_dev/lib/com/lnbei/html/core/data/attribute/xml/attr.cfg.xml",
            "SYSTEMTEMPLATEPATH"=>"G:/linbei/root/phpace_dev/lib/com/lnbei/html/core/template",//模板路径 
            "ROOTPATH"=>"G:/linbei/root/phpace_dev",//应用根目录
            "TEMPLATEPATH"=>"G:/linbei/root/phpace_dev/lib/com/lnbei/html/template",//模板地址
            "LOG"=>[
                "STATE"=>"ON",//OFF开启日志
                "LOGPATH"=>__DIR__."\\"."../../../../../log.txt",
            ],
            "LAYOUTTEMPLATEPATH" => array(//布局文件路径
                ROOTPATH . "extend/lnbeis/template/layout",
            ),
            "WIDGETTEMPLATEPATH"=>array(//自定义套件路径
                ROOTPATH . "extend/lnbeis/template/inputwidget"
            ),
        ];
?>