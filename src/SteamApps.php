<?php
namespace Steam;

/**
 * SteamApps provides an interface to the ISteamApps API, which provides
 * app listings and server information.
 *
 * @author Garion Herman <cheddam@me.com>
 */
class SteamApps extends SteamBase
{
	/**
	 * Retrieves a list of all apps (includes games and DLC, among other resources)
	 *
	 * @return mixed
	 */
	public function getAppList()
	{
		return $this->callApi('/ISteamApps/GetAppList/v0002/', []);
	}

	/**
	 * Retrieves a list of all Steam-compatible servers related to an address.
	 *
	 * @param string  A valid IPv4 address.
	 * @return mixed
	 */
	public function getServersAtAddress($address)
	{
		return $this->callApi('/ISteamApps/GetServersAtAddress/v1', ['addr' => $address]);
	}
}