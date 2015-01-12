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
		'apikey' => '',
		'format' => 'json'
	];

	public function __construct($apiKey, $baseUrl = '')
	{
		$this->defaultParameters['apikey'] = $apiKey;
		if (! empty($baseUrl)) $this->baseUrl = $baseUrl;

		$this->client = new Client($this->baseUrl);
	}

	protected function callApi($method, array $parameters, $responseFormat = 'json')
	{
		$request = $this->client->createRequest('GET', $method);
		$query = $request->getQuery();

		foreach ($this->getCombinedParameters($parameters) as $key => $value) {
			$query->set($key, $value);
		}

		$response = $request->send();

		// TODO: Make this smarter.
		switch ($responseFormat) {
			case 'json':
				return $response->json();
				break;

			case 'xml':
				return $response->xml();
				break;

			default:
				return $response->getBody(true);
				break;
		}
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