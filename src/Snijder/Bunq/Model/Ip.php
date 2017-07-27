<?php

namespace Snijder\Bunq\Model;


use PHPUnit\Exception;

class Ip {

	/**
	 * @var
	 */
	private $ip;

	/**
	 * @var string
	 */
	private $status;

	/**
	 * @return mixed
	 */
	public function getIp() {
		return $this->ip;
	}

	/**
	 * @param mixed $ip
	 * @throws \Exception
	 */
	public function setIp( $ip ) {
		if (!filter_var($ip, FILTER_VALIDATE_IP)) {
			throw new \Exception( $ip . " is not a valid Ip address." );
		}

		$this->ip = $ip;
	}

	/**
	 * @return string
	 */
	public function getStatus(): string {
		return $this->status;
	}

	/**
	 * @param string $status
	 */
	public function setStatus($status) {
		$this->status = IpStatus::get($status);
	}
}
