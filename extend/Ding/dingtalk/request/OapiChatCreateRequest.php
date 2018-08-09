<?php
/**
 * dingtalk API: dingtalk.oapi.chat.create request
 * 
 * @author auto create
 * @since 1.0, 2018.05.09
 */
class OapiChatCreateRequest
{
	/** 
	 * 群类型，2：企业群，0：普通群
	 **/
	private $conversationTag;
	
	/** 
	 * 外部联系人成员列表
	 **/
	private $extidlist;
	
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
	
	/** 
	 * 新成员可查看100条聊天历史消息的类型，1：可查看，默认或0：不可查看
	 **/
	private $showHistoryType;
	
	/** 
	 * 群成员userId列表
	 **/
	private $useridlist;
	
	private $apiParas = array();
	
	public function setConversationTag($conversationTag)
	{
		$this->conversationTag = $conversationTag;
		$this->apiParas["conversationTag"] = $conversationTag;
	}

	public function getConversationTag()
	{
		return $this->conversationTag;
	}

	public function setExtidlist($extidlist)
	{
		$this->extidlist = $extidlist;
		$this->apiParas["extidlist"] = $extidlist;
	}

	public function getExtidlist()
	{
		return $this->extidlist;
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

	public function setShowHistoryType($showHistoryType)
	{
		$this->showHistoryType = $showHistoryType;
		$this->apiParas["showHistoryType"] = $showHistoryType;
	}

	public function getShowHistoryType()
	{
		return $this->showHistoryType;
	}

	public function setUseridlist($useridlist)
	{
		$this->useridlist = $useridlist;
		$this->apiParas["useridlist"] = $useridlist;
	}

	public function getUseridlist()
	{
		return $this->useridlist;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.chat.create";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkMaxListSize($this->extidlist,20,"extidlist");
		RequestCheckUtil::checkMaxListSize($this->useridlist,20,"useridlist");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
