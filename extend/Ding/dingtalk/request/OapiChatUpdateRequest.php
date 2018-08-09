<?php
/**
 * dingtalk API: dingtalk.oapi.chat.update request
 * 
 * @author auto create
 * @since 1.0, 2018.05.09
 */
class OapiChatUpdateRequest
{
	/** 
	 * 添加外部联系人成员列表
	 **/
	private $addExtidlist;
	
	/** 
	 * 添加成员列表
	 **/
	private $addUseridlist;
	
	/** 
	 * 群会话id
	 **/
	private $chatid;
	
	/** 
	 * 删除外部联系人成员列表
	 **/
	private $delExtidlist;
	
	/** 
	 * 删除成员列表
	 **/
	private $delUseridlist;
	
	/** 
	 * 群名称
	 **/
	private $name;
	
	/** 
	 * 群主的userId
	 **/
	private $owner;
	
	/** 
	 * 群主类型，emp：企业员工，ext：外部联系人
	 **/
	private $ownerType;
	
	private $apiParas = array();
	
	public function setAddExtidlist($addExtidlist)
	{
		$this->addExtidlist = $addExtidlist;
		$this->apiParas["add_extidlist"] = $addExtidlist;
	}

	public function getAddExtidlist()
	{
		return $this->addExtidlist;
	}

	public function setAddUseridlist($addUseridlist)
	{
		$this->addUseridlist = $addUseridlist;
		$this->apiParas["add_useridlist"] = $addUseridlist;
	}

	public function getAddUseridlist()
	{
		return $this->addUseridlist;
	}

	public function setChatid($chatid)
	{
		$this->chatid = $chatid;
		$this->apiParas["chatid"] = $chatid;
	}

	public function getChatid()
	{
		return $this->chatid;
	}

	public function setDelExtidlist($delExtidlist)
	{
		$this->delExtidlist = $delExtidlist;
		$this->apiParas["del_extidlist"] = $delExtidlist;
	}

	public function getDelExtidlist()
	{
		return $this->delExtidlist;
	}

	public function setDelUseridlist($delUseridlist)
	{
		$this->delUseridlist = $delUseridlist;
		$this->apiParas["del_useridlist"] = $delUseridlist;
	}

	public function getDelUseridlist()
	{
		return $this->delUseridlist;
	}

	public function setName($name)
	{
		$this->name = $name;
		$this->apiParas["name"] = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setOwner($owner)
	{
		$this->owner = $owner;
		$this->apiParas["owner"] = $owner;
	}

	public function getOwner()
	{
		return $this->owner;
	}

	public function setOwnerType($ownerType)
	{
		$this->ownerType = $ownerType;
		$this->apiParas["ownerType"] = $ownerType;
	}

	public function getOwnerType()
	{
		return $this->ownerType;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.chat.update";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkMaxListSize($this->addExtidlist,20,"addExtidlist");
		RequestCheckUtil::checkMaxListSize($this->addUseridlist,20,"addUseridlist");
		RequestCheckUtil::checkMaxListSize($this->delExtidlist,20,"delExtidlist");
		RequestCheckUtil::checkMaxListSize($this->delUseridlist,20,"delUseridlist");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
