<?php
namespace Steam;

class SteamNews extends SteamBase
{
	/**
	 * Retrieves news for a particular app.
	 *
	 * @param int  A valid Steam App ID to retrieve news for.
	 * @param int  The number of entries that should be retrieved.
	 * @param int  A UNIX timestamp that marks the last point in time that news will be retrieved for.
	 * @param string  The format the reponse should be provided in (json|xml)
	 */
	public function getNewsForApp($appID, $entryCount = 20, $endDate = 0, $responseFormat = 'json')
	{
		return $this->callApi('/ISteamNews/GetNewsForApp/v0002', [
			'appid' => $appID,
			'enddate' => $endDate ?: time(),
			'count' => $entryCount
		], $responseFormat);
	}
}