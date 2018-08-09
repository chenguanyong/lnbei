<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"E:\f\phpace_dev\public/../application/test\view\file\index.html";i:1533177297;}*/ ?>

<title>部门管理</title>
<div class="row" style="margin:0px;">
  <div class="col-xs-2" style="border:#000 0px solid; padding-left: 3px;    padding-right: 8px;">
    <div class="row">
      <div class="col-xs-12">
        <div class="widget-box">
          <div class="widget-header widget-header-flat">
            <h4 class="widget-title smaller">部门列表</h4>
          </div>
          <div class="widget-body" style="font-size:10px;  height:500px; overflow:auto">
            <div class="widget-main" style="font-size:10px;">
              <ul id="treeDemocompany" class="ztree" style="font-size:8px; ">
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default col-xs-10" style="border:#000 0px solid; padding:2px"> 
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-3">
            <div class="input-group"> <span id="menuBtn"  class="input-group-addon"> 归属地区 </span>
              <input type="text" id="citySel" class="form-control search-query" placeholder="请选择城市">
              <div id="menuContentareas" class="menuContent" style="display:none; z-index:333;border:1px #dddddd solid;background-color: #ffffff; position: absolute; max-height:200px; overflow: auto;">
                <ul id="treeDemoareas" class="ztree" style="margin-top:0; width:160px;">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-5">
        <div class="clearfix">
          <button class="btn btn-sm btn-primary" data-type='3' data-toggle="modal" data-target="#myModal" data-whatever="修改角色">修改</button>
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='1' data-whatever="新增角色">添加</button>
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-type='2' data-whatever="删除角色">删除</button>
        </div>
      </div>
      <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
      </div>
    </div>
    <div style="clear:both">
      <table id="dynamic-table" class="table table-striped table-bordered table-hover" style="font-size:10px;">
      </table>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12"> 
            <form class="form-horizontal"  id="submitform" role="form" >
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" > 公司名: </label>
                <div for="RoleName" class="col-sm-8">
                  <input type="text" id="RoleName" name="OrganizationName" placeholder="Username" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 简称: </label>
                <div for="css" class="col-sm-8">
                  <input type="text" id="css" name="ShortName" placeholder="Text Field" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 状态: </label>
                <div for="IsDelete" class="col-sm-8">
                  <label>
                    <input id="IsDelete"  name="IsDelete" class="ace ace-switch ace-switch-4" type="checkbox">
                    <span class="lbl"></span> </label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" id="submitbutton" class="btn btn-primary">确定</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 结束模态框 -->
<div class="col-sm-6">
  <div id="dialog-message" class="hide">
    <p>您确定要删除该用户？</p>
  </div>
</div>
<div id="dialog" title="提示信息" style='display:none'>
  <p>请先选中一行！</p>
</div>
<div id="dialog_delete" title="提示信息" style='display:none'>
  <p>确定要删除！</p>
</div>
<div  class="modal fade"  tabindex="-1"  role="dialog"  UUID="5b626dccb27a57404"  PUUID="5b626dccb23bd7524"  ><div  class="modal-dialog"  role="document"  UUID="5b626dccb2b8e7620"  PUUID="5b626dccb27a57404"  ><div  class="modal-content"  UUID="5b626dccb2f762413"  PUUID="5b626dccb2b8e7620"  ><div  class="modal-header"  UUID="5b626dccb2f769558"  PUUID="5b626dccb2f762413"  ><button  type="button"  class="close"  data-dismiss="modal"  aria-label="Close"  UUID="5b626dccb335e2375"  PUUID="5b626dccb2f769558"  ><span  aria-hidden="true"  UUID="5b626dccb37464583"  PUUID="5b626dccb335e2375"  >@times;</span>
</button>
<h4  id="title"  class="modal-title"  UUID="5b626dccb3b2e7114"  PUUID="5b626dccb2f769558"  >添加</h4>
</div>
<div  id="body"  class="modal-body"  UUID="5b626dccb3f169535"  PUUID="5b626dccb2f762413"  ><div  class="form-group"  UUID="5b626dccc92f33516"  PUUID="5b626dccb3f169535"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dccc96db4009"  PUUID="5b626dccc92f33516"  ></label>
<div  class="col-sm-9"  UUID="5b626dccc96db4229"  PUUID="5b626dccc92f33516"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="ID"  value="a"  UUID="5b626dccc9ac32194"  PUUID="5b626dccc96db4229"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dccd61fe3661"  PUUID="5b626dccb3f169535"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dccd65e65081"  PUUID="5b626dccd61fe3661"  ></label>
<div  class="col-sm-9"  UUID="5b626dccd69ce5563"  PUUID="5b626dccd61fe3661"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="ShortName"  value="a"  UUID="5b626dccd6db61211"  PUUID="5b626dccd69ce5563"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcce6ba28586"  PUUID="5b626dccb3f169535"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcce6f8a1251"  PUUID="5b626dcce6ba28586"  ></label>
<div  class="col-sm-9"  UUID="5b626dcce73726501"  PUUID="5b626dcce6ba28586"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="OrganizationName"  value="a"  UUID="5b626dcce775a2560"  PUUID="5b626dcce73726501"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcd05a165851"  PUUID="5b626dccb3f169535"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcd05dfe2210"  PUUID="5b626dcd05a165851"  ></label>
<div  class="col-sm-9"  UUID="5b626dcd061e67995"  PUUID="5b626dcd05a165851"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="IsDelete"  value="a"  UUID="5b626dcd061e68936"  PUUID="5b626dcd061e67995"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcd1c17b1559"  PUUID="5b626dccb3f169535"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcd1c5635045"  PUUID="5b626dcd1c17b1559"  ></label>
<div  class="col-sm-9"  UUID="5b626dcd1c94c5217"  PUUID="5b626dcd1c17b1559"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="DatetimeUpdated"  value="a"  UUID="5b626dcd1c94c4662"  PUUID="5b626dcd1c94c5217"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcd35ba98054"  PUUID="5b626dccb3f169535"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcd35f913027"  PUUID="5b626dcd35ba98054"  ></label>
<div  class="col-sm-9"  UUID="5b626dcd3637a9561"  PUUID="5b626dcd35ba98054"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="Pid"  value="a"  UUID="5b626dcd3637a5547"  PUUID="5b626dcd3637a9561"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcd53c284336"  PUUID="5b626dccb3f169535"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcd540118747"  PUUID="5b626dcd53c284336"  ></label>
<div  class="col-sm-9"  UUID="5b626dcd540115124"  PUUID="5b626dcd53c284336"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="DatetimeCreated"  value="a"  UUID="5b626dcd543f93825"  PUUID="5b626dcd540115124"  />
</div>
</div>
</div>
<div  class="modal-footer"  UUID="5b626dccb3f167173"  PUUID="5b626dccb2f762413"  ><button  id="savebutton"  type="button"  class="btn btn-default"  data-dismiss="modal"  UUID="5b626dccb42fe1598"  PUUID="5b626dccb3f167173"  >确定</button>
<button  id="cancelbutton"  type="button"  class="btn btn-primary"  UUID="5b626dccb46e68563"  PUUID="5b626dccb3f167173"  >取消</button>
</div>
</div>
</div>
</div>
<div  class="modal fade"  tabindex="-1"  role="dialog"  UUID="5b626dcd8d22e5314"  PUUID="5b626dcd8d22e6611"  ><div  class="modal-dialog"  role="document"  UUID="5b626dcd8d6167215"  PUUID="5b626dcd8d22e5314"  ><div  class="modal-content"  UUID="5b626dcd8d9fe2773"  PUUID="5b626dcd8d6167215"  ><div  class="modal-header"  UUID="5b626dcd8dde62822"  PUUID="5b626dcd8d9fe2773"  ><button  type="button"  class="close"  data-dismiss="modal"  aria-label="Close"  UUID="5b626dcd8dde66855"  PUUID="5b626dcd8dde62822"  ><span  aria-hidden="true"  UUID="5b626dcd8e1ce2538"  PUUID="5b626dcd8dde66855"  >@times;</span>
</button>
<h4  id="title"  class="modal-title"  UUID="5b626dcd8e99e2056"  PUUID="5b626dcd8dde62822"  >编辑</h4>
</div>
<div  id="body"  class="modal-body"  UUID="5b626dcd8ed868437"  PUUID="5b626dcd8d9fe2773"  ><div  class="form-group"  UUID="5b626dcda49335737"  PUUID="5b626dcd8ed868437"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcda4d1b3256"  PUUID="5b626dcda49335737"  ></label>
<div  class="col-sm-9"  UUID="5b626dcda51049498"  PUUID="5b626dcda49335737"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="ID"  value="a"  UUID="5b626dcda51046255"  PUUID="5b626dcda51049498"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcdb1c263589"  PUUID="5b626dcd8ed868437"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcdb1c265845"  PUUID="5b626dcdb1c263589"  ></label>
<div  class="col-sm-9"  UUID="5b626dcdb200f6896"  PUUID="5b626dcdb1c263589"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="ShortName"  value="a"  UUID="5b626dcdb23f73142"  PUUID="5b626dcdb200f6896"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcdc25ca5901"  PUUID="5b626dcd8ed868437"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcdc29b26815"  PUUID="5b626dcdc25ca5901"  ></label>
<div  class="col-sm-9"  UUID="5b626dcdc2d9a3963"  PUUID="5b626dcdc25ca5901"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="OrganizationName"  value="a"  UUID="5b626dcdc31832796"  PUUID="5b626dcdc2d9a3963"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcdd52977983"  PUUID="5b626dcd8ed868437"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcdd567f5820"  PUUID="5b626dcdd52977983"  ></label>
<div  class="col-sm-9"  UUID="5b626dcdd5a675607"  PUUID="5b626dcdd52977983"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="IsDelete"  value="a"  UUID="5b626dcdd5e4f7015"  PUUID="5b626dcdd5a675607"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcdeb6142809"  PUUID="5b626dcd8ed868437"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcdeb9fc8683"  PUUID="5b626dcdeb6142809"  ></label>
<div  class="col-sm-9"  UUID="5b626dcdebde45261"  PUUID="5b626dcdeb6142809"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="DatetimeUpdated"  value="a"  UUID="5b626dcdec1cc8438"  PUUID="5b626dcdebde45261"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dce10e022740"  PUUID="5b626dcd8ed868437"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dce10e021590"  PUUID="5b626dce10e022740"  ></label>
<div  class="col-sm-9"  UUID="5b626dce111ea7163"  PUUID="5b626dce10e022740"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="Pid"  value="a"  UUID="5b626dce115d28054"  PUUID="5b626dce111ea7163"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dce2d7115847"  PUUID="5b626dcd8ed868437"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dce2d7116010"  PUUID="5b626dce2d7115847"  ></label>
<div  class="col-sm-9"  UUID="5b626dce2daf98998"  PUUID="5b626dce2d7115847"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="DatetimeCreated"  value="a"  UUID="5b626dce2dee13177"  PUUID="5b626dce2daf98998"  />
</div>
</div>
</div>
<div  class="modal-footer"  UUID="5b626dcd8f16e7465"  PUUID="5b626dcd8d9fe2773"  ><button  id="savebutton"  type="button"  class="btn btn-default"  data-dismiss="modal"  UUID="5b626dcd8f5564312"  PUUID="5b626dcd8f16e7465"  >确定</button>
<button  id="cancelbutton"  type="button"  class="btn btn-primary"  UUID="5b626dcd8f93e2516"  PUUID="5b626dcd8f16e7465"  >取消</button>
</div>
</div>
</div>
</div>
<div  class="modal fade"  tabindex="-1"  role="dialog"  UUID="5b626dce678ce2449"  PUUID="5b626dce678ce5376"  ><div  class="modal-dialog"  role="document"  UUID="5b626dce67cb68447"  PUUID="5b626dce678ce2449"  ><div  class="modal-content"  UUID="5b626dce6809e4495"  PUUID="5b626dce67cb68447"  ><div  class="modal-header"  UUID="5b626dce684861020"  PUUID="5b626dce6809e4495"  ><button  type="button"  class="close"  data-dismiss="modal"  aria-label="Close"  UUID="5b626dce684867449"  PUUID="5b626dce684861020"  ><span  aria-hidden="true"  UUID="5b626dce6886f4996"  PUUID="5b626dce684867449"  >@times;</span>
</button>
<h4  id="title"  class="modal-title"  UUID="5b626dce68c574669"  PUUID="5b626dce684861020"  >查看</h4>
</div>
<div  id="body"  class="modal-body"  UUID="5b626dce6903f7123"  PUUID="5b626dce6809e4495"  ><div  class="form-group"  UUID="5b626dce7efd41506"  PUUID="5b626dce6903f7123"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dce7f3bc6269"  PUUID="5b626dce7efd41506"  ></label>
<div  class="col-sm-9"  UUID="5b626dce7f3bc4966"  PUUID="5b626dce7efd41506"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="ID"  value="a"  UUID="5b626dce7f7a44580"  PUUID="5b626dce7f3bc4966"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dce8c6af3679"  PUUID="5b626dce6903f7123"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dce8ca979025"  PUUID="5b626dce8c6af3679"  ></label>
<div  class="col-sm-9"  UUID="5b626dce8ca972123"  PUUID="5b626dce8c6af3679"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="ShortName"  value="a"  UUID="5b626dce8ce7f3929"  PUUID="5b626dce8ca972123"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dce9dc0b1817"  PUUID="5b626dce6903f7123"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dce9dff34499"  PUUID="5b626dce9dc0b1817"  ></label>
<div  class="col-sm-9"  UUID="5b626dce9e3db4763"  PUUID="5b626dce9dc0b1817"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="OrganizationName"  value="a"  UUID="5b626dce9e3db3018"  PUUID="5b626dce9e3db4763"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dceb18783553"  PUUID="5b626dce6903f7123"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dceb18783470"  PUUID="5b626dceb18783553"  ></label>
<div  class="col-sm-9"  UUID="5b626dceb1c606633"  PUUID="5b626dceb18783553"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="IsDelete"  value="a"  UUID="5b626dceb20481973"  PUUID="5b626dceb1c606633"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcec8f7d6519"  PUUID="5b626dce6903f7123"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcec8f7d6505"  PUUID="5b626dcec8f7d6519"  ></label>
<div  class="col-sm-9"  UUID="5b626dcec93654275"  PUUID="5b626dcec8f7d6519"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="DatetimeUpdated"  value="a"  UUID="5b626dcec974d8570"  PUUID="5b626dcec93654275"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcee21db1226"  PUUID="5b626dce6903f7123"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcee21db3184"  PUUID="5b626dcee21db1226"  ></label>
<div  class="col-sm-9"  UUID="5b626dcee25c32719"  PUUID="5b626dcee21db1226"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="Pid"  value="a"  UUID="5b626dcee29ab2017"  PUUID="5b626dcee25c32719"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcf0a4c22919"  PUUID="5b626dce6903f7123"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcf0a8aa5922"  PUUID="5b626dcf0a4c22919"  ></label>
<div  class="col-sm-9"  UUID="5b626dcf0a8aa2903"  PUUID="5b626dcf0a4c22919"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="DatetimeCreated"  value="a"  UUID="5b626dcf0ac921092"  PUUID="5b626dcf0a8aa2903"  />
</div>
</div>
</div>
<div  class="modal-footer"  UUID="5b626dce694279478"  PUUID="5b626dce6809e4495"  ><button  id="savebutton"  type="button"  class="btn btn-default"  data-dismiss="modal"  UUID="5b626dce6980f1739"  PUUID="5b626dce694279478"  >确定</button>
<button  id="cancelbutton"  type="button"  class="btn btn-primary"  UUID="5b626dce69bf77920"  PUUID="5b626dce694279478"  >取消</button>
</div>
</div>
</div>
</div>
<div  class="modal fade"  tabindex="-1"  role="dialog"  UUID="5b626dcf44a675521"  PUUID="5b626dcf44a673199"  ><div  class="modal-dialog"  role="document"  UUID="5b626dcf44e4f7007"  PUUID="5b626dcf44a675521"  ><div  class="modal-content"  UUID="5b626dcf452377924"  PUUID="5b626dcf44e4f7007"  ><div  class="modal-header"  UUID="5b626dcf4561f8243"  PUUID="5b626dcf452377924"  ><button  type="button"  class="close"  data-dismiss="modal"  aria-label="Close"  UUID="5b626dcf45a082360"  PUUID="5b626dcf4561f8243"  ><span  aria-hidden="true"  UUID="5b626dcf45df07295"  PUUID="5b626dcf45a082360"  >@times;</span>
</button>
<h4  id="title"  class="modal-title"  UUID="5b626dcf45df03981"  PUUID="5b626dcf4561f8243"  >删除</h4>
</div>
<div  id="body"  class="modal-body"  UUID="5b626dcf461d88769"  PUUID="5b626dcf452377924"  ><div  class="form-group"  UUID="5b626dcf5c16d4634"  PUUID="5b626dcf461d88769"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcf5c5558805"  PUUID="5b626dcf5c16d4634"  ></label>
<div  class="col-sm-9"  UUID="5b626dcf5c5557644"  PUUID="5b626dcf5c16d4634"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="ID"  value="a"  UUID="5b626dcf5c93d8644"  PUUID="5b626dcf5c5557644"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcf690789463"  PUUID="5b626dcf461d88769"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcf694607937"  PUUID="5b626dcf690789463"  ></label>
<div  class="col-sm-9"  UUID="5b626dcf698482930"  PUUID="5b626dcf690789463"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="ShortName"  value="a"  UUID="5b626dcf69c301494"  PUUID="5b626dcf698482930"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcf796349830"  PUUID="5b626dcf461d88769"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcf796349574"  PUUID="5b626dcf796349830"  ></label>
<div  class="col-sm-9"  UUID="5b626dcf79a1c1691"  PUUID="5b626dcf796349830"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="OrganizationName"  value="a"  UUID="5b626dcf79e042430"  PUUID="5b626dcf79a1c1691"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcf8f1e15793"  PUUID="5b626dcf461d88769"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcf8f5c98690"  PUUID="5b626dcf8f1e15793"  ></label>
<div  class="col-sm-9"  UUID="5b626dcf8fd993176"  PUUID="5b626dcf8f1e15793"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="IsDelete"  value="a"  UUID="5b626dcf901818290"  PUUID="5b626dcf8fd993176"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcfab7079836"  PUUID="5b626dcf461d88769"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcfabaef4888"  PUUID="5b626dcfab7079836"  ></label>
<div  class="col-sm-9"  UUID="5b626dcfabed86544"  PUUID="5b626dcfab7079836"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="DatetimeUpdated"  value="a"  UUID="5b626dcfac2c06336"  PUUID="5b626dcfabed86544"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcfc97869537"  PUUID="5b626dcf461d88769"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcfc9b6e9773"  PUUID="5b626dcfc97869537"  ></label>
<div  class="col-sm-9"  UUID="5b626dcfc9f575596"  PUUID="5b626dcfc97869537"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="Pid"  value="a"  UUID="5b626dcfca33f2443"  PUUID="5b626dcfc9f575596"  />
</div>
</div>
<div  class="form-group"  UUID="5b626dcfeb6863070"  PUUID="5b626dcf461d88769"  ><label  class="col-sm-3 control-label no-padding-right"  for="form-field-1"  UUID="5b626dcfeb6862308"  PUUID="5b626dcfeb6863070"  ></label>
<div  class="col-sm-9"  UUID="5b626dcfeba6e9090"  PUUID="5b626dcfeb6863070"  ><input  type="text"  id="form-field-1"  placeholder="Username"  class="col-xs-10 col-sm-5"  name="DatetimeCreated"  value="a"  UUID="5b626dcfebe564015"  PUUID="5b626dcfeba6e9090"  />
</div>
</div>
</div>
<div  class="modal-footer"  UUID="5b626dcf465c01783"  PUUID="5b626dcf452377924"  ><button  id="savebutton"  type="button"  class="btn btn-default"  data-dismiss="modal"  UUID="5b626dcf469a81239"  PUUID="5b626dcf465c01783"  >确定</button>
<button  id="cancelbutton"  type="button"  class="btn btn-primary"  UUID="5b626dcf46d901357"  PUUID="5b626dcf465c01783"  >取消</button>
</div>
</div>
</div>
</div>
<script>$(function ()
{
var scripts = [null,"__js__/LBtree/twotree.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables/media/js/jquery.dataTables.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/_mod/datatables/jquery.dataTables.bootstrap.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/dataTables.buttons.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.flash.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.html5.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.print.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-buttons/js/buttons.colVis.js", "<?php echo \think\Config::get('__PUBLIC__'); ?>/static/components/datatables.net-select/js/dataTables.select.js", null]
$('.page-content-area').ace_ajax('loadScripts', scripts, function ()
{
    //inline scripts related to this page
    jQuery(function ($)
    {
		var $scrpe = {
				param:{
					companyID:1,//公司ID
					cityID:1,//城市ID
					departID:1,//部门ID
					keyword:null,//关键字
				},
				url:"index/Department/getDepar?id=0",//全局URL
				input:{},
				fun:function (event, treeId, treeNode){
					createTable();
				}
		}
    	//构造url
        var datatable = function(){

    		//构造url
    		this.makeUrl = function (){
    			
    			var url = "?cash=0";
    			if($scrpe.param.companyID != 0){
    				url += "&cp="+$scrpe.param.companyID;
    			}
    			if($scrpe.param.cityID !=0){
    				url += "&ct="+$scrpe.param.cityID;
    			}
    			if($scrpe.param.keyword !=null){
    				url += "&kw="+$scrpe.param.keyword;
    			}
    			url = $scrpe.url +url;
    			return url;
    		}
    	}

        
    	twotree($,$scrpe);
    	var dataTableConfig = {"columns":[{"data":"","title":"\u5168\u9009"},{"data":"ID","title":"\u5b57\u6bb5\u540d","orderable":false},{"data":"ShortName","title":"\u5b57\u6bb5\u540d","orderable":false},{"data":"OrganizationName","title":"\u5b57\u6bb5\u540d","orderable":false},{"data":"IsDelete","title":"\u5b57\u6bb5\u540d","orderable":false},{"data":"DatetimeUpdated","title":"\u5b57\u6bb5\u540d","orderable":false},{"data":"Pid","title":"\u5b57\u6bb5\u540d","orderable":false},{"data":"DatetimeCreated","title":"\u5b57\u6bb5\u540d","orderable":false},{"data":"","title":"\u5168\u9009"}],"columnDefs":[{"orderable":false,"targets":0,"data":null,"defaultContent":"<label class='pos-rel'><input type='checkbox' class='ace' \/><span class='lbl'><\/span><\/label>"},{"orderable":false,"targets":8,"data":null,"defaultContent":"<a data-type='1' data-whatever='\u4fee\u6539\u89d2\u8272' class='btn btn-success btn-xs'><i class='fa fa-edit'><\/i> \u4fee\u6539<\/a><a  data-type='1' data-whatever='\u5220\u9664\u89d2\u8272' class='btn btn-danger btn-xs'><i class='fa fa-trash'><\/i> \u5220\u9664<\/a>"},{"targets":7,"visible":false,"searchable":false}],"drawCallback":"function (settings)  {}","language":{"sProcessing":"\u5904\u7406\u4e2d...","sLengthMenu":"\u663e\u793a _MENU_ \u9879\u7ed3\u679c","sZeroRecords":"\u6ca1\u6709\u5339\u914d\u7ed3\u679c","sInfo":"\u663e\u793a\u7b2c _START_ \u81f3 _END_ \u9879\u7ed3\u679c\uff0c\u5171 _TOTAL_ \u9879","sInfoEmpty":"\u663e\u793a\u7b2c 0 \u81f3 0 \u9879\u7ed3\u679c\uff0c\u5171 0 \u9879","sInfoFiltered":"(\u7531 _MAX_ \u9879\u7ed3\u679c\u8fc7\u6ee4)","sInfoPostFix":"","sSearch":"\u641c\u7d22=>","sUrl":"","sEmptyTable":"\u8868\u4e2d\u6570\u636e\u4e3a\u7a7a","sLoadingRecords":"\u8f7d\u5165\u4e2d...","sInfoThousands":",","oPaginate":{"sFirst":"\u9996\u9875","sPrevious":"\u4e0a\u9875","sNext":"\u4e0b\u9875","sLast":"\u672b\u9875"},"oAria":{"sSortAscending":": \u4ee5\u5347\u5e8f\u6392\u5217\u6b64\u5217","sSortDescending":": \u4ee5\u964d\u5e8f\u6392\u5217\u6b64\u5217"}},"bProcessing":true,"bServerSide":true,"sAjaxSource":""};//表格插件配置文件
        //initiate dataTables plugin
    	dataTableConfig.drawCallback = function (settings)  {}
    	dataTableConfig.sAjaxSource=new datatable().makeUrl();
        var myTable = $('#dynamic-table').DataTable(dataTableConfig);
        console.log(dataTableConfig);
        datatable.prototype.reDreaw = function(){
	    		//重新绘制database
	    			url = this.makeUrl();
	    			myTable.ajax.url(url).load();
	    			return true;
	     }
	     //部门树的回调函数
		function createTable(){
			new datatable().reDreaw();
		}

        $('[data-tree]').on('click', function ()
        {
            $('#myModal2').modal('hide');
            var id = $('#depart').attr('data-id');
            $(id).val($('#depart').attr('data-tree'))
            .attr('data-companyID', $('#depart').attr('data-value'));
        }
        );
  
        $('#myModal').on('show.bs.modal', function (event)
        {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var type = button.data('type');
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
            var mytables = myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr'))[0][0];
            var d = myTable.row(mytables).data();
            if (type == 1)
            {
            	$("#submitbutton").attr("data-type",'1');
            	$("#submitbutton").attr("data-pid",d.Pid);
                return;
            }
            var checked_count = $('#dynamic-table tbody').find('[data-checked=1]').toArray().length;
            if (checked_count == 0)
            {
                $('#myModal').modal('hide');
                $("#dialog").dialog(
                {
                    modal : true,
                    dialogClass : "no-close",
                    buttons : [
                        {
                            text : "OK",
                            click : function ()
                            {
                                $(this).dialog("close");
                            }
                        }
                    ]
                }
                );
                return false;
            }
            else
            {	

            if (type == 2)
            {

                $('#myModal').modal('hide');
                $("#dialog_delete").dialog(
                {
                    modal : true,
                    dialogClass : "no-close",
                    buttons : [
                        {
                            text : "取消",
                            click : function ()
                            {
                                $(this).dialog("close");
                            }
                        },
                        {
                            text : "确定",
                            click : function ()  {
                            	$(this).dialog("close");
                                $.post('<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Department/deleDepart',
                                        {
                                            id:d.ID,
                                            oper:"del"
                                        }, function (data)
                                        {
                                            if(data.code == 1){
                                            	
                                            	alert(data.msg);
                                            	myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr')).remove()
                                                .draw();
                                            }else{
                                            	alert(data.msg);
                                            }

                                        }, 'Json');
                            }
                        }
                    ]
                }
                );
                return false;
            }
            	$("#submitbutton").attr("data-type",'3');
                $("#submitbutton").attr("data-id",d.ID);
                $("#submitbutton").attr("data-pid",d.Pid);
                $('#RoleName').val(d.OrganizationName); //获取归属公司id和值
                $('#css').val(d.ShortName); //获取归属公司id和值
                if(d.IsDelete == 0){
                	$("#IsDelete").prop("checked",false);
                }else{
                	$("#IsDelete").prop("checked",true);
                }
            }
        });

    	var EDITVIEWValidatorRuleCallbackFun = function() {
	        //$('#myModal').modal('hide');
	        var id = $("#submitbutton").attr("data-id");
	      	var IsDelete = $("#IsDelete").is(":checked");
	      	var parentID = $("#submitbutton").attr("data-pid");
	      	var type = $("#submitbutton").attr("data-type");
	      	if(IsDelete == true){
	      		IsDelete = 1;
	      	}else{
	      		IsDelete = 0;
	      	}
	      	var oper = null;
	      	if(type ==3 ){
	      		oper = "edit";
	      	}else {
	      		oper = "add";
	      	}
	        $.post('test/ce_file/EDITVIEW',
	        {
	        	Name : $('#RoleName').val(),
	        	shortname : $('#css').val(),
	        	IsDelete : IsDelete,
	        	pid:parentID,
	            id:id,
	            oper:oper
	        }, function (data)
	        {
	            if(data.code == 1){
	            	 $('#myModal').modal('hide');
	            	alert(data.msg);
	            	myTable.draw();
	            }else{
	            	alert(data.msg);
	            }
	         
	        }, 'Json');
	
	    };
    	var CAddValidatorRuleCallbackFun = EDITVIEWValidatorRuleCallbackFun;
    	var CLookValidatorRuleCallbackFun = EDITVIEWValidatorRuleCallbackFun;
    	var CEditValidatorRuleCallbackFun = EDITVIEWValidatorRuleCallbackFun;
    	//编辑表单验证配置文件
    	var EDITVIEWValidatorRuleConfig = {"rules":{"ID":{"required":true},"ShortName":{"required":true},"OrganizationName":{"required":true},"IsDelete":{"required":true},"DatetimeUpdated":{"required":true},"Pid":{"required":true},"DatetimeCreated":{"required":true}},"messages":{"ID":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"ShortName":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"OrganizationName":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"IsDelete":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"DatetimeUpdated":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"Pid":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"DatetimeCreated":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"}},"submitHandler":"EDITVIEWValidatorRuleCallbackFun"};
    	if(EDITVIEWValidatorRuleConfig != null){
    		
    		$("EDITVIEW").validate(EDITVIEWValidatorRuleConfig);
    	}
    	//添加表单验证配置文件
    	var ADDVIEWValidatorRuleConfig = {"rules":{"ID":{"required":true},"ShortName":{"required":true},"OrganizationName":{"required":true},"IsDelete":{"required":true},"DatetimeUpdated":{"required":true},"Pid":{"required":true},"DatetimeCreated":{"required":true}},"messages":{"ID":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"ShortName":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"OrganizationName":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"IsDelete":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"DatetimeUpdated":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"Pid":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"DatetimeCreated":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"}},"submitHandler":"ADDVIEWValidatorRuleCallbackFun"};
    	if(ADDVIEWValidatorRuleConfig != null){
    		
    		$("EDITVIEW").validate(ADDVIEWValidatorRuleConfig);
    	}  	
    	//编辑表单验证配置文件
    	var LOOKVIEWValidatorRuleConfig = {"rules":{"ID":{"required":true},"ShortName":{"required":true},"OrganizationName":{"required":true},"IsDelete":{"required":true},"DatetimeUpdated":{"required":true},"Pid":{"required":true},"DatetimeCreated":{"required":true}},"messages":{"ID":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"ShortName":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"OrganizationName":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"IsDelete":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"DatetimeUpdated":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"Pid":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"DatetimeCreated":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"}},"submitHandler":"LOOKVIEWValidatorRuleCallbackFun"};
    	if(LOOKVIEWValidatorRuleConfig != null){
    		
    		$("LOOKVIEW").validate(LOOKVIEWValidatorRuleConfig);
    	}
    	//编辑表单验证配置文件
    	var DELEVIEWValidatorRuleConfig = {"rules":{"ID":{"required":true},"ShortName":{"required":true},"OrganizationName":{"required":true},"IsDelete":{"required":true},"DatetimeUpdated":{"required":true},"Pid":{"required":true},"DatetimeCreated":{"required":true}},"messages":{"ID":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"ShortName":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"OrganizationName":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"IsDelete":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"DatetimeUpdated":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"Pid":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"},"DatetimeCreated":{"required":"\u4e0d\u80fd\u4e3a\u7a7a"}},"submitHandler":"DELEVIEWValidatorRuleCallbackFun"};
    	if(DELEVIEWValidatorRuleConfig != null){
    		
    		$("DELEVIEW").validate(DELEVIEWValidatorRuleConfig);
    	}

        $('#dynamic-table tbody').on('click', 'td .btn.btn-success.btn-xs', function ()
        {
        	$("#submitbutton").attr("data-type",'3');
            var mytables = myTable.rows($(this).parent('td').parent('tr'))[0][0];
            var d = myTable.row(mytables).data();
            $("#submitbutton").attr("data-id",d.ID);
            $("#submitbutton").attr("data-pid",d.Pid);
            $('#RoleName').val(d.OrganizationName); //获取归属公司id和值
            $('#css').val(d.ShortName); //获取归属公司id和值
            if(d.IsDelete == 0){
            	$("#IsDelete").prop("checked",false);
            }else{
            	$("#IsDelete").prop("checked",true);
            }
            $('#myModal').modal('show');
        });
        $('#dynamic-table tbody').on('click', '.btn.btn-danger.btn-xs', function ()
        {

            $("#dialog_delete").dialog(
            {
                modal : true,
                dialogClass : "no-close",
                buttons : [
                    {
                        text : "取消",
                        click : function ()
                        {
                            $(this).dialog("close");
                        }
                    },
                    {
                        text : "确定",
                        click : function ()  {
                        	$(this).dialog("close");
                            var mytables = myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr'))[0][0];
                            var d = myTable.row(mytables).data();
                            $.post('<?php echo \think\Config::get('__PUBLIC__'); ?>/index/Department/deleDepart',
                                    {
                                        id:d.ID,
                                        oper:"del"
                                        
                                    }, function (data)
                                    {
                                        if(data.code == 1){
                                        	
                                        	alert(data.msg);
                                        	myTable.rows($('#dynamic-table tbody').find('[data-checked=1]').parent('label').parent('td').parent('tr')).remove().draw(false);
                                        }else{
                                        	alert(data.msg);
                                        }

                                    }, 'Json');
                        }
                    }
                ]
            });
        });
        $('#dynamic-table tbody').on('click', 'tr', function ()
        {
            if ($(this).hasClass('selected'))
            {
                $(this).removeClass('selected');
                $('#dynamic-table tbody').find('input:checkbox').prop('checked', false).attr('data-checked', 0); ;
                //$(this).find('input:checkbox').prop('checked', false);
            }
            else
            {
                myTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('#dynamic-table tbody').find('input:checkbox').prop('checked', false);
                $('#dynamic-table tbody').find('input:checkbox').attr('data-checked', 0);
                $(this).find('input:checkbox').prop('checked', true).attr('data-checked', 1); ;
            }
        });

        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function ()
        {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $('#dynamic-table').find('tbody > tr').each(function ()
            {
                var row = this;
                if (th_checked)
                    myTable.row(row).select();
                else
                    myTable.row(row).deselect();
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]', function ()
	        {
	            var row = $(this).closest('tr').get(0);
	            if (this.checked)
	                myTable.row(row).deselect();
	            else
	                myTable.row(row).select();
	        }
        );
        $(document).on('click', '#dynamic-table .dropdown-toggle', function (e)
	        {
	            e.stopImmediatePropagation();
	            e.stopPropagation();
	            e.preventDefault();
	        }
        );
	});

  });

});
</script>
