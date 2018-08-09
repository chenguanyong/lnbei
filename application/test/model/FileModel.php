<?PHP 
Namespace app\test\model;
use think\Model;

 class FileModel  extends Model { 
 public $pk = "ID" ;

 protected $table = "file" ;


public function getList( $where, $page, $rownum){ 
    $count = $this->where($where)->count($this->pk);
    $back_result = array();
    $i = 0;
    $result = $this->where($where)->limit($page,$rownum)->select();
    foreach ($result as $result_row){
        $back_result[$i] = $result_row;
        $i++;
    }
    return ['data'=> $back_result,'length' => $count];
 }

public function add( $data){ 
    $result = $this->isUpdate(false)->save($data);
    return $result;
 }

public function dele( $ID){ 
    
    return $this->save(["" . $this->pk . ""=>$ID]);   
 }

public function updates( $data){ 
    return $this->update($data); 
 }


 } 





 ?>