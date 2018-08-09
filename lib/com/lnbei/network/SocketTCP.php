<?php

namespace com\lnbei\network;

class socket_tcp{
	private $ip;
	private $port;
	private $socket ;

	public function __construct($ip1,$port){
    	$this->ip=$ip1;
    	$this->port=$port;
    	$this->init();	
	}
	private function init(){
        $this->socket=@socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if (!is_resource($this->socket)) {
            throw new error_exp(socket_strerror(socket_last_error()), $this->socket);
        }
        if (!socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, 1)) {
            throw new error_exp(socket_strerror(socket_last_error()), $this->socket);
        }
        if (!socket_connect($this->socket,$this->ip,$this->port)) {
            throw new error_exp(socket_strerror(socket_last_error()), $this->socket);
        }
	}
	public function socketTcpSend($re){
    	if(	socket_write($this->socket,"#".$re."#")===false){
    		return false;
    	}else return true;
	}
	public function socket_tcp_rec(){
    	$buf = '';
        if (false !=($bytes = socket_recv($this->socket, $buf, 250, MSG_WAITALL))) {
           return $buf;
        } else {
            return false;
        }
	}
    public function socket_tcp_rec1($t){
    	$buf = '';
        if (false !=($bytes = socket_recv($this->socket, $buf, $t, MSG_WAITALL))) {
           return $buf;
        } else {
            return false;
        }
    }
	
	public function error_code(){
	}
	public function socket_s(){
		$re=array($this->socket);
		$r=null;
		$t=null;
	    return;	
	}
	public function close(){
		socket_close($this->socket);
	}

}

//$socket=new socket_tcp("127.0.0.1", 3000);
//$socket->socketTcpSend("333dsdsdsd");
//$socket->socket_tcp_close();