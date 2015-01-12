<?php
namespace Steam;

use Guzzle\Http\Client;

/**
 * SteamBase is the class all Steam API classes extend from.
 * It provides the basic functionality required to make requests.
 *
 * @author Garion Herman <cheddam@me.com>
 */
class SteamBase
{
	private $client;

	private $baseUrl = 'http://api.steampowered.com';

	private $defaultParameters = [
		'key' => '',
		'format' => 'json'
	];

	public function __construct($apiKey, $baseUrl = '')
	{
		$this->defaultParameters['key'] = $apiKey;
		if (! empty($baseUrl)) $this->baseUrl = $baseUrl;

		$this->client = new Client($this->baseUrl);
	}

	/**
	 * Calls the Steam API and returns the response in JSON.
	 *
	 * @return mixed
	 */
	protected function callApi($method, array $parameters)
	{
		$request = $this->client->createRequest('GET', $method);
		$query = $request->getQuery();

		foreach ($this->getCombinedParameters($parameters) as $key => $value) {
			$query->set($key, $value);
		}

		$response = $request->send();
		
		return $response->json();
	}

	/**
	 * Merges default parameters with supplied ones.
	 *
	 * @param array  An associative array of request parameters.
	 */
	private function getCombinedParameters($addedParameters)
	{
		return array_merge($this->defaultParameters, $addedParameters);
	}
}