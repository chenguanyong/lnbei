<?php
namespace com\lnbei\cache;

	abstract class AbstractCache{

    	/**
    	*写缓存
    	*@auhor cgy
    	*@date 2016-10-2 上午01:02:43
    	*@param string
    	*@return string
    	*
    	*/
    	function cacheWrite($name,$value);
    
    	/**
    	*读缓存
    	*@auhor cgy
    	*@date 2016-10-2 上午01:04:13
    	*@param string
    	*@return string
    	*
    	*/
    	function cacheRead($name);
	}