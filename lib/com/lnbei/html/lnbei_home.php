<?php
return [
        "db"=>
        [
            "drive"=>"think",
            "database"=>"ce",
        ],
        "NAMESPACEDIR"=>__DIR__."\\"."../../../../../",//命名空间目录
        "TOOLDIR"=>__DIR__."\\"."../../../../../",
        "TAGPATH"=>LNBEIPATH . "\\tag\\xml\\tag.cfg.xml",//"E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\tag\\xml\\tag.cfg.xml",
        "TAGCSSPATH"=>LNBEIPATH . "\\core\\data\\css\\xml\\css.cfg.xml",//"E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\data\\css\\xml\\css.cfg.xml",
        "TAGATTRPATH"=>LNBEIPATH . "\\core\\data\\attribute\\xml\\attr.cfg.xml",//"E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\data\\attribute\\xml\\attr.cfg.xml"
        "SYSTEMTEMPLATEPATH"=>LNBEIPATH . "\\core\\template",//模板路径"E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\core\\template",//模板路径
        "ROOTPATH"=>"E:\\f\\phpace_dev",//应用根目录
        "TEMPLATEPATH"=>LNBEIPATH . "\\template",//模板地址"E:\\f\\phpace_dev\\lib\\com\\lnbei\\html\\template",//模板地址
        "LOG"=>[
            "STATE"=>"ON",//OFF开启日志
            "LOGPATH"=>__DIR__."\\"."../../../../../log.txt",
        ],
        "LAYOUTTEMPLATEPATH" => array(//布局文件路径
        
        ),
        "WIDGETTEMPLATEPATH"=>array(//自定义套件路径
             
        ),
    ];

    