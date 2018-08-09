/**
  * 设置控件属性的object
 */
(function(LB){
	/**
	 * 控件属性
	 */
	LB.WightAttr = {
			name:null,//空间名称
			backgroundcolor:null,//空间背景颜色
			width:0,//宽度
			height:0,//高度
			data:null,//表名
			where:[],//条件
			title:null,//标题
			isHide:false,//是否显示
			theme:null,//主题
			length:10;
	};
	/**
	 * 图片控件的属性
	 */
	LB.ImageWightAttr = {
			name:null,//空间名称
			backgroundcolor:null,//空间背景颜色
			width:0,//宽度
			height:0,//高度
			data:[],//图片数据
			where:[],//条件
			title:null,//标题
			isHide:false,//是否显示
			theme:null,//主题
			length:10;
	};
	/**
	 * 图片存储对象
	 */
	LB.ImageData={
			url:null,//图片实际路径
			name:null,//图片名称
	}
})(window)