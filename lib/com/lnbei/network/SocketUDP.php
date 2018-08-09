<?php
namespace com\lnbei\network;
class SocketUDP{
	public $socket;
	public $string;
	public $ip;
	public $port;
	public function __construct($ip,$port){
		$this->ip=$ip;
		$this->port=$port;
		$this->string="";
		$this->init();
	}
	private function init(){
		$this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		if(is_resource($this->socket)){
			return true;
		}else { throw new error_exp("udp", $this->socket);
		return false;}
	}
	public function socket_write($str){
		$len=strlen($str);
		socket_sendto($this->socket, $str, $len, 0, $this->ip,$this->port);
	}//
	
	public static function socket_read( $ip,$port){
		$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		socket_bind($socket, $ip, $port);
		$from = '';
		$port = 0;
		$i=0;
		$buf=0;
		socket_recvfrom($socket, $buf, 120, 0, $from, $port);
		return $buf;
	}
	public function socket_close(){
		socket_close($this->socket);
	}
	public function error_code(){
	}
}