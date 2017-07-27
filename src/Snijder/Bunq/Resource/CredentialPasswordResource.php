<?php

namespace Snijder\Bunq\Resource;

use Snijder\Bunq\BunqClient;

class CredentialPasswordResource {
	/**
	 * @var BunqClient
	 */
	private $BunqClient;

	/**
	 * @var int
	 */
	private $userIdentifier;

	/**
	 * CredentialPasswordResource constructor.
	 *
	 * @param BunqClient $BunqClient
	 * @param int $userIdentifier
	 */
	public function __construct(BunqClient $BunqClient, int $userIdentifier)
	{
		$this->BunqClient = $BunqClient;
		$this->userIdentifier = $userIdentifier;
	}

	/**
	 * Lists all the Credential Passwords for the current user.
	 *
	 * @return array
	 */
	public function listCredentialPassword()
	{
		return $this->BunqClient->getHttpService()->get(
			$this->getResourceEndpoint()
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getResourceEndpoint(): string
	{
		return "/v1/user/" . $this->userIdentifier . "/credential-password-ip";
	}
}
