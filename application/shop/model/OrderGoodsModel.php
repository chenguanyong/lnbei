<?php
namespace app\mall\model;

use think\Model;
class OrderGoodsModel extends Model
{
    protected $table="xx_order_goods";
    /**
     * [getGoodsByOrderID 通过订单ID获取货物]
     * @return [type] [description]
     * @author cgy
     */    
    public function getGoodsByOrderID($order_id){
        return $this->cache(true,10)->join("xx_goods","xx_order_goods.goods_id = xx_goods.goodsId")->where(["xx_order_goods.order_id"=>$order_id])->select();
    }
    /**
     * [getOrderGoodsByWhere 通过条件获取订单]
     * @return [type] [description]
     * @author cgy
     */    
    public function getOrderGoodsByWhere($map, $Nowpage, $limits)
    {
        return $this
        ->cache(true,10)->where($map)->page($Nowpage, $limits)->order('order_id desc')->select();
    }
}

?>