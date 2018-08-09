<?php
namespace com\lnbei\db\driver;
use com\lnbei\db\Drive;
/**
 * 操作mysql数据库
 * @author Administrator
 *
 */
class LBMySQL implements Drive
{
    var $link;
    var $querynum = 0;
    public function __construct($host,$user,$pwd,$dbname,$pconnect = false){
        
        self::connect($host,$user,$pwd,$dbname,$pconnect);
    }
    function connect($host,$user,$pwd,$dbname,$pconnect = false) {
        $this->link = $pconnect ? @mysql_pconnect($host.':3306',$user,$pwd) : @mysql_connect($host.':3306',$user,$pwd);
        if ( !$this->link ) {
            $this->halt('Connect to MySQL failed!');
        }
        if ( !mysql_select_db($dbname, $this->link) ) {
            $this->halt('Cannot use database!');
        }
        if ($this->version() > '4.1') {
            mysql_query('SET NAMES '.strtolower(str_replace('-','',TOA_CHARSET)).';',$this->link);
        }
    }
    
    function _query($sql, $unbuffer = false ) {
        if ( $unbuffer && function_exists('mysql_unbuffered_query') ) {
            $query = @mysql_unbuffered_query($sql, $this->link);
        } else {
            $query = @mysql_query($sql,$this->link);
        }
        $this->querynum ++;
        !$query && $this->halt('Query Error: ',$sql);
        return $query;
    }
    
    function fetch_array($query,$result_type = MYSQL_ASSOC) {
        return mysql_fetch_array($query,$result_type);
    }
    
    function fetch_one_array($sql) {
        $query = $this->_query($sql);
        return $this->fetch_array($query);
    }
    
    function fetch_all($sql) {
        $result = array();
        $query = $this->_query($sql);
        while($row = $this->fetch_array($query)) {
            $result[] = $row;
        }
        return $result;
    }
    
    function result($sql, $row = 0) {
        $query = $this->_query($sql);
        return @mysql_result($query, $row);
    }
    
    function free_result($query) {
        return mysql_free_result($query);
    }
    
    //插入一条记录
    function insert($table, $data, $replace = false, $pre = true) {
        $pre && $table = DB_TABLEPRE.$table;
        $method = $replace ? 'REPLACE ' : 'INSERT';
        $fields = $values = $split = '';
        foreach ( $data as $key => $val ) {
            $fields .= $split."`$key`";
            $values .= $split."'$val'";
            $split = ', ';
        }
        $sql = "$method INTO `$table` ($fields) VALUES ($values)";
        $this->_query($sql);
        return $this->insert_id();
    }
    //更新记录
    function update($table, $data, $where, $pre = true) {
        $pre && $table = DB_TABLEPRE.$table;
        $updatesql = $wheresql = $split = '';
        foreach ( $data as $key => $val ) {
            $updatesql .= $split."`$key` = '$val'";
            $split = ', ';
        }
        if ( empty($where) ) {
            $wheresql = '1';
        } else {
            $split = '';
            foreach ($where as $key => $val ) {
                $wheresql .= $split."`$key` = '$val'";
                $split = ' AND ';
            }
        }
        $sql = "UPDATE `$table` SET $updatesql WHERE $wheresql";
        $this->_query($sql);
        return $this->affected_rows();
    }
    //返回上一次insert的id
    function insert_id() {
        return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->_query("SELECT last_insert_id()"), 0);
    }
    
    function num_fields($query) {
        return mysql_num_fields($query);
    }
    
    function num_rows($query) {
        return mysql_num_rows($query);
    }
    
    function affected_rows() {
        return mysql_affected_rows($this->link);
    }
    
    function close() {
        return @mysql_close($this->link);
    }
    
    function version() {
        return mysql_get_server_info($this->link);
    }
    
    function halt($msg = '',$sql = '') {
        $output = '<div style="font-size:11px;font-family:Verdana">msg:'.$msg.'<br />sql:'.$sql.'<br />errno:'.mysql_errno().'<br />error:'.mysql_error().'</div>';
        exit($output);
    }
    /**
     * 查询SQL
     */
    public function query($sql){
        
        return self::fetch_all($sql);
    }
    /**
     *
     * @param string $sql
     */
    public function freeResult($sql){
        $result = self::_query($sql);
        return self::free_result($result);
    }
    
    /**
     * 返回最后插入的ID
     */
    public function insertID(){
        
        return self::insertID();
    }
    /**
     * 返回受影响的行数
     */
    public function affectedRows(){
        
        return self::affected_rows();
        
    }
    public function __destruct(){
        self::close();
    }
}

?>