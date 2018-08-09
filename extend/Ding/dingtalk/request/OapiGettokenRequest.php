<?php
/**
 * dingtalk API: dingtalk.oapi.gettoken request
 * 
 * @author auto create
 * @since 1.0, 2018.05.09
 */
class OapiGettokenRequest
{
	/** 
	 * corpid
	 **/
	private $corpid;
	
	/** 
	 * corpsecret
	 **/
	private $corpsecret;
	
	private $apiParas = array();
	
	public function setCorpid($corpid)
	{
		$this->corpid = $corpid;
		$this->apiParas["corpid"] = $corpid;
	}

	public function getCorpid()
	{
		return $this->corpid;
	}

	public function setCorpsecret($corpsecret)
	{
		$this->corpsecret = $corpsecret;
		$this->apiParas["corpsecret"] = $corpsecret;
	}

	public function getCorpsecret()
	{
		return $this->corpsecret;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.gettoken";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
