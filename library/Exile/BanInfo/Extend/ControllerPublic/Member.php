<?php

class Exile_BanInfo_Extend_ControllerPublic_Member extends XFCP_Exile_BanInfo_Extend_ControllerPublic_Member
{
	public function actionMember()
	{
		$response = parent::actionMember();

		if ($response instanceof XenForo_ControllerResponse_View)
		{
			$user =& $response->params['user'];
			$banned = $this->getModelFromCache('XenForo_Model_Banning')->getBannedUserById($user['user_id']);

			if ($user && isset($banned) && !empty($banned))
			{
				$user['ban_date']   = $banned['ban_date'];
				$user['ban_end']    = $banned['end_date'];
				$user['ban_reason'] = $banned['user_reason'] ? $banned['user_reason'] : 'N/A';
			}
		}

		return $response;
	}
}