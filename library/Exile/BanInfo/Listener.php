<?php

class Exile_BanInfo_Listener
{
	public static function extendMemberController($class, array &$extend)
	{
		$extend[] = 'Exile_BanInfo_Extend_ControllerPublic_Member';
	}

	public static function extendUserProfileModel($class, array &$extend)
	{
		$extend[] = 'Exile_BanInfo_Extend_Model_UserProfile';
	}
}