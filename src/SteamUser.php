<?php
namespace Steam;

/**
 * SteamUser provides access to the ISteamUser API, which handles
 * retrieval of basic user data.
 *
 * @author Garion Herman <cheddam@me.com>
 */
class SteamUser extends SteamBase
{
	/**
	 * Retrieves the profiles of Steam users.
	 *
	 * @param array  A list of 64bit Steam IDs to retrieve data for.
	 */
	public function getPlayerSummaries(array $userIds)
	{
		$idlist = implode(',', $userIds);

		return $this->callApi('/ISteamUser/GetPlayerSummaries/v0002', [
			'steamids' => $idlist
		]);
	}

	/**
	 * Retrieves the friend list of a Steam user.
	 *
	 * @param string  The 64bit Steam ID of the user.
	 * @param string  Filters by a given role (all|friend) [NOT SURE WHAT THIS DOES CURRENTLY]
	 */
	public function getFriendList($steamID, $relationship = 'all')
	{
		return $this->callApi('/ISteamUser/GetFriendList/v1', [
			'steamid' => $steamID,
			'relationship' => $relationship
		]);
	}

	/** 
	 * Retrieves the list of groups associated with a Steam user.
	 *
	 * @param string  The 64bit Steam ID of the user.
	 */
	public function getGroupList($steamID)
	{
		return $this->callApi('/ISteamUser/GetUserGroupList/v1', [
			'steamid' => $steamID
		]);
	}

	/**
	 * Finds a Steam user's 64bit ID by their Vanity URL.
	 *
	 * @param string  The vanity URL of the user (ie. steamcommunity.com/id/{vanityurl})
	 * @return string|null  The user's 64bit Steam ID if they were found, or null if not.
	 */
	public function findByVanityUrl($vanityUrl)
	{
		$response = $this->callApi('/ISteamUser/ResolveVanityURL/v0001/', [
			'vanityurl' => $vanityUrl
		]);

		if ($response->success = 42) {
			return null;
		} else {
			return $reponse->steamid;
		}
	}
}