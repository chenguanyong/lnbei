/**
 * 弹出窗口js
 */
(function (factory){
	
  if (typeof define === 'function' && define.amd) {
	    // AMD. Register as anonymous module.
	    define(['jquery'], factory);
	  } else if (typeof exports === 'object') {
	    // Node / CommonJS
	    factory(require('jquery'));
	  } else {
	    // Browser globals.
	    factory(jQuery);
	  }
	
})(function ($){

	'use strict';
	
	function Layer(){
		
		
	}
	
	$(document).ready(function (){
		
		var layer = new Layer();
		
		window.LB.layer = layer;
		
	});
})