<?php
namespace Steam;

/**
 * SteamNews provides access to the ISteamNews API, which provides
 * news retrieval for apps.
 *
 * @author Garion Herman <cheddam@me.com>
 */
class SteamNews extends SteamBase
{
	/**
	 * Retrieves news for a particular app.
	 *
	 * @param int  A valid Steam App ID to retrieve news for.
	 * @param int  The number of entries that should be retrieved.
	 * @param int  A UNIX timestamp that marks the last point in time that news will be retrieved for.
	 */
	public function getNewsForApp($appID, $entryCount = 20, $endDate = 0)
	{
		return $this->callApi('/ISteamNews/GetNewsForApp/v0002', [
			'appid' => $appID,
			'enddate' => $endDate ?: time(),
			'count' => $entryCount
		]);
	}
}