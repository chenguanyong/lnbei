<?php
/**
 * dingtalk API: dingtalk.oapi.attendance.listRecord request
 * 
 * @author auto create
 * @since 1.0, 2018.05.11
 */
class OapiAttendanceListRecordRequest
{
	/** 
	 * 查询考勤打卡记录的结束工作日。注意，起始与结束工作日最多相隔7天
	 **/
	private $checkDateFrom;
	
	/** 
	 * 查询考勤打卡记录的结束工作日。注意，起始与结束工作日最多相隔7天
	 **/
	private $checkDateTo;
	
	/** 
	 * 企业内的员工id列表，最多不能超过50个
	 **/
	private $userIds;
	
	private $apiParas = array();
	
	public function setCheckDateFrom($checkDateFrom)
	{
		$this->checkDateFrom = $checkDateFrom;
		$this->apiParas["checkDateFrom"] = $checkDateFrom;
	}

	public function getCheckDateFrom()
	{
		return $this->checkDateFrom;
	}

	public function setCheckDateTo($checkDateTo)
	{
		$this->checkDateTo = $checkDateTo;
		$this->apiParas["checkDateTo"] = $checkDateTo;
	}

	public function getCheckDateTo()
	{
		return $this->checkDateTo;
	}

	public function setUserIds($userIds)
	{
		$this->userIds = $userIds;
		$this->apiParas["userIds"] = $userIds;
	}

	public function getUserIds()
	{
		return $this->userIds;
	}

	public function getApiMethodName()
	{
		return "dingtalk.oapi.attendance.listRecord";
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
