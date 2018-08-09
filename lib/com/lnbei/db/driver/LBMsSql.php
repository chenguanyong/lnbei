<?php
namespace com\lnbei\db\driver;
/**
 * 操作Ms sql server 数据库
 * @author Administrator
 *
 */
class LBMsSql
{
    private $link;
    private $querynum = 0;
    private $user;
    private $pwd;
    private $dbname;
    private $host;
    public function __construct($host,$user,$pwd,$dbname){
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->dbname = $dbname;
    }
    public function connect() {
         
        $this->link = @odbc_connect('DRIVER={SQL Server};SERVER=' . $this->host . ';DATABASE=' . $this->dbname ,$this->user,$this->pwd);
        if ( !$this->link ) {
            $this->halt('Connect to MsSql failed!');
        }
    }
    
    public function query($sql, $unbuffer = false ) {
        if ( $unbuffer && function_exists('odbc_execute') ) {
            $query = @odbc_execute($this->link, $sql);
        } else {
            $query = @odbc_exec($this->link,$sql);
        }
        $this->querynum ++;
        !$query && $this->halt('Query Error: ',$sql);
        return $query;
    }
    
    public function fetch_array($query) {
        return odbc_fetch_array($query);
    }
    
    public function fetch_one_array($sql) {
        $query = $this->query($sql);
        return $this->fetch_array($query);
    }
    
    public function fetch_all($sql) {
        $result = array();
        $query = $this->query($sql);
        while($row = $this->fetch_array($query)) {
            $result[] = $row;
        }
        return $result;
    }
    
    public function result($sql, $row = 0) {
        $query = $this->query($sql);
        return @odbc_result($query);
    }
    
    public function free_result($query) {
        return odbc_free_result($query);
    }
    
    //插入一条记录
    public function insert($table, $data, $replace = false, $pre = true) {
        $pre && $table = $table;
        $method = $replace ? 'REPLACE ' : 'INSERT';
        $fields = $values = $split = '';
        foreach ( $data as $key => $val ) {
            $fields .= $split."[$key]";
            $values .= $split."'$val'";
            $split = ', ';
        }
        $sql = "$method INTO $table ($fields) VALUES ($values)";
        $this->query($sql);
        return $this->insert_id();
    }
    //更新记录
    public function update($table, $data, $where, $pre = true) {
        $pre && $table = $table;
        $updatesql = $wheresql = $split = '';
        foreach ( $data as $key => $val ) {
            $updatesql .= $split."[$key] = '$val'";
            $split = ', ';
        }
        if ( empty($where) ) {
            $wheresql = '1';
        } else {
            $split = '';
            foreach ($where as $key => $val ) {
                $wheresql .= $split."[$key] = '$val'";
                $split = ' AND ';
            }
        }
        $sql = "UPDATE [$table] SET $updatesql WHERE $wheresql";
         
        return  $this->query($sql);
    }
    //返回上一次insert的id
    public function insert_id() {
        $id = $this->fetch_one_array("select @@identity");
        $id =(int)array_pop($id);
        return $id;
    }
    public function num_fields($query) {
        return odbc_num_fields($query);
    }
    public function num_rows($query) {
        return odbc_num_rows($query);
    }
    public function close() {
        return @odbc_close($this->link);
    }
    public function halt($msg = '',$sql = '') {
        $output = '<div style="font-size:11px;font-family:Verdana">msg:'.$msg.'<br />sql:'.$sql.'<br />errno:'.mysql_errno().'<br />error:'.mysql_error().'</div>';
        exit($output);
    }
    public function __destruct(){
        self::close();
    }
}

?>