
<?php 
function getTargetOneSize($id){
    global $db;
    $sql = "SELECT count(0) f FROM " . DB_TABLEPRE . DB_JT . "duty where targetoneid = " . $id;
    $row = $db->fetch_one_array($sql);
    return $row['f'];
}
function getTargetTwoSize($id){
    global $db;
    $sql = "SELECT count(0) f FROM " . DB_TABLEPRE . DB_JT . "duty where targettwoid = " . $id;
    $row = $db->fetch_one_array($sql);
    return $row['f'];
}
function getTargetListByWhere($where){
    global $db;
    $sql = "SELECT DISTINCT o.* FROM " . DB_TABLEPRE . DB_JT . "duty o," . DB_TABLEPRE . DB_JT . "target_tpl p WHERE (o.targetoneid = p.id OR o.targettwoid = p.id) and p.`year`=".$where ." ORDER BY o.targetoneid DESC,o.targettwoid DESC" ;
    $row = $db->fetch_all($sql);
    return $row;
}

$a1 = getGP('pagesize','G');
$a2 = getGP('page','G');
$pagesize=empty($a1)?20:$a1;
$page=empty($a2)?1:$a2;
$a3 = getGP("year","G");
$where = empty($a3)?date('Y'):$a3;
$dataArray = getTargetListByWhere($where);

?>
<!DOCTYPE html>
<html lang="cn">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<title>OA办公系统</title>
        <link rel="stylesheet" type="text/css" href="<?php echo style2015;?>content/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo style2015;?>content/css/bootstrap-modal.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo style2015;?>content/css/bootstrap.css"> 
		<link rel="stylesheet" type="text/css" href="<?php echo style2015;?>bootstrap/css/bootstrap-datetimepicker.css"> 
        <link rel="stylesheet" type="text/css" href="<?php echo style2015;?>content/css/base.css">
		<link rel="stylesheet" type="text/css" href="<?php echo style2015;?>content/css/style.css">
		<script type="text/javascript" src="<?php echo style2015;?>content/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo style2015;?>content/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo style2015;?>content/js/bootstrap-modal.js"></script>
		<script type="text/javascript" src="<?php echo style2015;?>content/js/bootstrap-modalmanager.js"></script>
		<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
   </head>
	<body >

	<div class="content" >

			<!--文件夹结束-->
			
			<div id="folder-grid" class="grid-view">
<div class="search_area">
    <form method="get" action="admin.php" name="searchs" class="form-horizontal">

        <div class="form-search form-search-top" style="text-align:left;padding-left:20px;">
			<div class="adv-select-label">选择年份：</div>
			<select name="year"   style="width: 120px;" id="year">
		  <?php
		  for($i = 2017; $i<=2040 ; $i++){
		     echo "<option value='" . $i . "'/>" . $i ."</option>";
		  }
		   ?>
		  </select>年  
           <!-- <button  onClick="formview()" type="button" class="btn">切换更多查询</button> -->
        </div>
       
    </form>
</div>


				<table class="items table table-striped" style="margin-bottom:0px;">
					<thead>
						<tr>
							<th style="width: 5%;" >序号</th>
							<th style="width: 15%;">一级指标</th>
							<th style="width: 20%;">二级指标</th>
							<th style="width: 20%;">三级指标</th>
							<th style="width: 20%;">完成要求</th>
							<th style="width: 10%">未完成/已完成</th>
							<th style="text-align:center;">操作</th>
						</tr>

					</thead>
					</table>
					<div style="position:absolute; height:64%; width:100%;overflow:auto; ">
					<table class="items table table-striped" style="margin-top:0px;">
				    <tbody>
						<?php 
						$one = 0;
						$tempsize = 0 ;
						$two = 0;
						$temptwo = 0;
						$dsie = 1;
						$temtwoid = 0;
						//var_dump($dataArray);
						foreach ($dataArray as $key => $value){
						    $onesize = getTargetOneSize($value['targetoneid']);
						    $twosize = getTargetTwoSize($value['targettwoid']);

						    ?>	
						<tr>
							
							<?php if($one == 0 ){
							    $tempsize = $onesize;
							    ?>
							<td class="odd" rowspan="<?php echo $onesize == 1? 0:$onesize; ?>" style="width: 5%; border: 1px solid #ddd"><?php echo $dsie;?> </td>
							<td class="odd" rowspan="<?php echo $onesize == 1? 0:$onesize; ?>"  style="width: 15%; border: 1px solid #ddd"><?php echo $value['targetone'];?></td>
							<?php }else{
							    if($tempsize != $onesize){
							        $dsie++;
							    ?>
							    <td class="odd" rowspan="<?php echo $onesize == 1? 0:$onesize; ?>" style="width: 5%; border: 1px solid #ddd"><?php echo $dsie;?> </td>
							    <td class="odd" rowspan="<?php echo $onesize == 1? 0:$onesize; ?>"  style="width: 15%; border: 1px solid #ddd"><?php echo $value['targetone'];?></td>
							    <?php 
							    
							        $one=1;
							        $tempsize = $onesize;
							    
							    }
							}
							    $one++;
							?>
							<?php if($two == 0 ){
							    $temptwo = $twosize;
							    $temtwoid = $value['targettwoid'];
							    ?>
							<td class="odd" rowspan="<?php echo $twosize == 1? 0:$twosize; ?>" style="width: 20%; border: 1px solid #ddd" ><?php echo $value['targettwo'];?></td>
							<?php }else{
							    if($temptwo != $twosize || $temtwoid != $value['targettwoid']){?>
							     <td class="odd" rowspan="<?php  echo $twosize == 1? 0:$twosize;?>" style="width: 20%; border: 1px solid #ddd" ><?php echo $value['targettwo'];?></td>
							   <?php  
							    $two=1;
							    $temtwoid = $value['targettwoid'];
							    $temptwo = $twosize;}
							}
							    $two++;
							?>
							
							
							<td class="odd" style="width: 20%;border: 1px solid #ddd"><?php echo $value['title']?></td>
							<td class="odd" style="width: 20%;border: 1px solid #ddd"><?php echo $value['content']?></td>
							<td class="odd" style="width: 10%;border: 1px solid #ddd"><?php echo $value['completesize']?>/<?php echo $value['issuedsize']?> </td>
							<td class="odd" style="border: 1px solid #ddd" >
							<a  style=" margin-top:3px;" href="admin.php?ac=duty&do=view&cc=a&fileurl=duty&id=<?php echo $value['id']?>">查看</a>
							</td>
						</tr>
						
						<?php }?>
						<?php if(count($dataArray)==0) echo"无数据";?>
					</tbody>
					
				</table>
				<div style="float:right; text-align:right; margin-right:20px;">
					
				</div>
			</div>
				
			</div>
		</div>
	
			<script>


				$(document).on('click',"[data-toggle=modal]", function (event) {
					
					var id = $(this).attr("data-workid");
					$("#delebutton").attr("data-id",id);
					})	
				$(document).on("click","#delebutton",function(){
					
						var id = $(this).attr("data-id");
						$.post("admin.php?ac=tpl&view=dele&fileurl=duty",{id:id},function (str){

							if(str.code==1){
								window.location.href="admin.php?ac=tpl&fileurl=duty";
							}else{
								alert(str.msg);	
							}				

							},"json");
					});
			</script>
		<script type="text/javascript" src="<?php echo style2015;?>content/js/workflow.js"></script>
<script type="text/javascript">

$(function (){
	$("#year").val("<?php echo date('Y')?>");
	$("#year").change(function(){
		window.location.href = "admin.php?ac=tpl&fileurl=duty&view=viewinfo&year="+$(this).val();
		})
});

</script>
	</body>
</html>