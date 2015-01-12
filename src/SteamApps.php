<?php
namespace Steam;

/**
 * Provides an interface to the ISteamApps API.
 *
 * @author Garion Herman <cheddam@me.com>
 */
class SteamApps extends SteamBase
{
	/**
	 * Retrieves a list of all apps (includes games and DLC, among other resources)
	 *
	 * @param string  The format the reponse should be provided in (json|xml)
	 * @return mixed
	 */
	public function getAppList($responseFormat = 'json')
	{
		return $this->callApi('/ISteamApps/GetAppList/v0002/', [], $responseFormat);
	}

	/**
	 * Retrieves a list of all Steam-compatible servers related to an address.
	 *
	 * @param string  A valid IPv4 address.
	 * @param string  The format the reponse should be provided in (json|xml)
	 * @return mixed
	 */
	public function getServersAtAddress($address, $responseFormat = 'json')
	{
		return $this->callApi('/ISteamApps/GetServersAtAddress/v1', ['addr' => $address], $responseFormat);
	}
}