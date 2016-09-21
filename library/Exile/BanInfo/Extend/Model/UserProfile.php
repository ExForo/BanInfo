<?php

class Exile_BanInfo_Extend_Model_UserProfile extends XFCP_Exile_BanInfo_Extend_Model_UserProfile
{
	public function canViewFullUserProfile(array $user, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$response = parent::canViewFullUserProfile($user, $errorPhraseKey, $viewingUser);
		$this->standardizeViewingUserReference($viewingUser);

		if (!XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'viewProfile'))
		{
			return false;
		}

		if ($user['is_banned'])
		{
			return true;
		}

		return $response;
	}
}