<?php

namespace Snijder\Bunq\Resource;

use Snijder\Bunq\BunqClient;
use Snijder\Bunq\Model\Ip;

class PermittedIpResource {
	/**
	 * @var BunqClient
	 */
	private $BunqClient;

	/**
	 * @var int
	 */
	private $userIdentifier;

	/**
	 * @var int
	 */
	private $credentialPasswordId;

	/**
	 * PermittedIpResource constructor.
	 *
	 * @param BunqClient $BunqClient
	 * @param int $userIdentifier
	 * @param int $credentialPasswordId
	 */
	public function __construct(BunqClient $BunqClient, int $userIdentifier, int $credentialPasswordId)
	{
		$this->BunqClient = $BunqClient;
		$this->userIdentifier = $userIdentifier;
		$this->credentialPasswordId = $credentialPasswordId;
	}

	/**
	 * Lists all the Permitted Ips for the current user credential.
	 *
	 * @return array
	 */
	public function listPermittedIps()
	{
		return $this->BunqClient->getHttpService()->get(
			$this->getResourceEndpoint()
		);
	}

	/**
	 * Add a Permitted Ip for the current user credential.
	 *
	 * @param Ip $ip
	 *
	 * @return array
	 */
	public function createPermittedIp(Ip $ip)
	{
		$options = [
			'json' => array(
				"ip" => $ip->getIp(),
				"status" => $ip->getStatus()
			)
		];

		return $this->BunqClient->getHttpService()->post(
			$this->getResourceEndpoint(),
			$options
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getResourceEndpoint(): string
	{
		return "/v1/user/" . $this->userIdentifier . "/credential-password-ip/" . $this->credentialPasswordId . "/ip";
	}
}
