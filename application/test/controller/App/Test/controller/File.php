<?PHP 
Namespace app\Test\controller;
use app\common\controller\Base;
use app\common\controller\Bases;
use app\Test\model\app\Test\controller\FileModel;

 class App\Test\controller\File  extends Base { 
 public $iDisplayStart = "iDisplayStart" ;

 public $iDisplayLength = "iDisplayLength" ;

 public $pk = "ID" ;

 protected $model = "ID" ;

 private $modelName = "app\Test\controller\FileModel" ;


public function add( $param, $param1){ 

$var = "sdfsadf";
return "sdfasfd";    

 }

public function ajaxGetArea(){ 
    
    $id = input("id");
    if($id == null){
        $id = 0;
    }
    $city = new AreaModel();
    $result = $city->getAreaList($id);
        $new_result=array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['ID'];
            $new_result[$k]['pId']=(int)$v['parentID'];
            $new_result[$k]['name']=$v['name'];
            //$new_result[$k]['iconSkin']=$v['css'];
            $new_result[$k]['isParent']=$city->isParent($v['ID']);
           // $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
           // $new_result[$k]['target'] = 'list_currency';
        }
    return json($new_result);
 }

public function addJson(){ 
   if(request()->isAjax()){
     $model = $this->model;
    $data = input("post.");
    if(isset($data[$this->pk])){
        unset($data[$this->pk]);
    }
    //var_dump($data);
    //exit;
    $result = $model ->add($data);
    if($result == null){
        return json(array("code"=>0,"msg"=>"添加失败"));
    }else{
        return json(array("code"=>1,"msg"=>"添加成功"));
    } 
 }    
 }

public function deleJson(){ 
  if(request()->isAjax()){
     $model = $this->model;
     $id = input($this->pk);
     $result = $model ->dele($id);
     if($result == null){
         return json(array("code"=>0,"msg"=>"删除失败"));
     }else{
         return json(array("code"=>1,"msg"=>"删除成功"));
     } 
 }   
    
 }

public function updateJson(){ 
   if(request()->isAjax()){
     $model = $this->model;
     $data = input("post.");
     $datas = array();
     foreach ($data as $key=>$value){
         
         if($value!=""){
             $datas[$key]=$value;
         }
     }
     $result = $model ->update($datas);
      if($result == null){
          return json(array("code"=>0,"msg"=>"修改失败"));
      }else{
          return json(array("code"=>1,"msg"=>"修改成功"));
      } 
 }      
 }

public function index(){ 
    return $this->fetch('index');
 }

protected function _initialize(){ 
parent::_initialize();
$this->model = new $this->modelName();
 }


 } 





 ?><?PHP 
Namespace app\Test\controller;
use app\common\controller\Base;
use app\common\controller\Bases;
use app\Test\model\app\Test\controller\FileModel;

 class App\Test\controller\File  extends Base { 
 public $iDisplayStart = "iDisplayStart" ;

 public $iDisplayLength = "iDisplayLength" ;

 public $pk = "ID" ;

 protected $model = "ID" ;

 private $modelName = "app\Test\controller\FileModel" ;


public function add( $param, $param1){ 

$var = "sdfsadf";
return "sdfasfd";    

 }

public function ajaxGetArea(){ 
    
    $id = input("id");
    if($id == null){
        $id = 0;
    }
    $city = new AreaModel();
    $result = $city->getAreaList($id);
        $new_result=array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['ID'];
            $new_result[$k]['pId']=(int)$v['parentID'];
            $new_result[$k]['name']=$v['name'];
            //$new_result[$k]['iconSkin']=$v['css'];
            $new_result[$k]['isParent']=$city->isParent($v['ID']);
           // $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
           // $new_result[$k]['target'] = 'list_currency';
        }
    return json($new_result);
 }

public function addJson(){ 
   if(request()->isAjax()){
     $model = $this->model;
    $data = input("post.");
    if(isset($data[$this->pk])){
        unset($data[$this->pk]);
    }
    //var_dump($data);
    //exit;
    $result = $model ->add($data);
    if($result == null){
        return json(array("code"=>0,"msg"=>"添加失败"));
    }else{
        return json(array("code"=>1,"msg"=>"添加成功"));
    } 
 }    
 }

public function deleJson(){ 
  if(request()->isAjax()){
     $model = $this->model;
     $id = input($this->pk);
     $result = $model ->dele($id);
     if($result == null){
         return json(array("code"=>0,"msg"=>"删除失败"));
     }else{
         return json(array("code"=>1,"msg"=>"删除成功"));
     } 
 }   
    
 }

public function updateJson(){ 
   if(request()->isAjax()){
     $model = $this->model;
     $data = input("post.");
     $datas = array();
     foreach ($data as $key=>$value){
         
         if($value!=""){
             $datas[$key]=$value;
         }
     }
     $result = $model ->update($datas);
      if($result == null){
          return json(array("code"=>0,"msg"=>"修改失败"));
      }else{
          return json(array("code"=>1,"msg"=>"修改成功"));
      } 
 }      
 }

public function index(){ 
    return $this->fetch('index');
 }

protected function _initialize(){ 
parent::_initialize();
$this->model = new $this->modelName();
 }


 } 





 ?><?PHP 
Namespace app\Test\controller;
use app\common\controller\Base;
use app\common\controller\Bases;
use app\Test\model\app\Test\controller\FileModel;

 class App\Test\controller\File  extends Base { 
 public $iDisplayStart = "iDisplayStart" ;

 public $iDisplayLength = "iDisplayLength" ;

 public $pk = "ID" ;

 protected $model = "ID" ;

 private $modelName = "app\Test\controller\FileModel" ;


public function add( $param, $param1){ 

$var = "sdfsadf";
return "sdfasfd";    

 }

public function ajaxGetArea(){ 
    
    $id = input("id");
    if($id == null){
        $id = 0;
    }
    $city = new AreaModel();
    $result = $city->getAreaList($id);
        $new_result=array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['ID'];
            $new_result[$k]['pId']=(int)$v['parentID'];
            $new_result[$k]['name']=$v['name'];
            //$new_result[$k]['iconSkin']=$v['css'];
            $new_result[$k]['isParent']=$city->isParent($v['ID']);
           // $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
           // $new_result[$k]['target'] = 'list_currency';
        }
    return json($new_result);
 }

public function addJson(){ 
   if(request()->isAjax()){
     $model = $this->model;
    $data = input("post.");
    if(isset($data[$this->pk])){
        unset($data[$this->pk]);
    }
    //var_dump($data);
    //exit;
    $result = $model ->add($data);
    if($result == null){
        return json(array("code"=>0,"msg"=>"添加失败"));
    }else{
        return json(array("code"=>1,"msg"=>"添加成功"));
    } 
 }    
 }

public function deleJson(){ 
  if(request()->isAjax()){
     $model = $this->model;
     $id = input($this->pk);
     $result = $model ->dele($id);
     if($result == null){
         return json(array("code"=>0,"msg"=>"删除失败"));
     }else{
         return json(array("code"=>1,"msg"=>"删除成功"));
     } 
 }   
    
 }

public function updateJson(){ 
   if(request()->isAjax()){
     $model = $this->model;
     $data = input("post.");
     $datas = array();
     foreach ($data as $key=>$value){
         
         if($value!=""){
             $datas[$key]=$value;
         }
     }
     $result = $model ->update($datas);
      if($result == null){
          return json(array("code"=>0,"msg"=>"修改失败"));
      }else{
          return json(array("code"=>1,"msg"=>"修改成功"));
      } 
 }      
 }

public function index(){ 
    return $this->fetch('index');
 }

protected function _initialize(){ 
parent::_initialize();
$this->model = new $this->modelName();
 }


 } 





 ?>