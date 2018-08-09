<?php
/**
 * dingtalk API: dingtalk.oapi.role.add_role_group request
 * 
 * @author auto create
 * @since 1.0, 2018.07.02
 */
class OapiRoleAddRoleGroupRequest
{
	/** 
	 * 名称
	 **/
	private $name;
	
	private $apiParas = array();
	
	public function setName($name)
	{
		$this->name = $name;
		$this->apiParas["name"] = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.role.add_role_group";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->name,"name");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
