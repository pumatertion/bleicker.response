<?php

namespace Bleicker\Response\Http;

use Bleicker\Response\ResponseInterface;
use Bleicker\Response\MainResponseInterface;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * Class Response
 *
 * @package Bleicker\Response\Http
 */
class Response extends HttpResponse implements MainResponseInterface {

	/**
	 * @var ResponseInterface
	 */
	protected $parentResponse;

	/**
	 * @return ResponseInterface
	 */
	public function getParentResponse() {
		return $this->parentResponse;
	}

	/**
	 * @param ResponseInterface $parentResponse
	 * @return $this
	 */
	public function setParentResponse(ResponseInterface $parentResponse) {
		$this->parentResponse = $parentResponse;
		return $this;
	}

	/**
	 * @return ResponseInterface
	 */
	public function getMainResponse() {
		$parentResponse = $this->getParentResponse();
		if ($parentResponse === NULL) {
			return $this;
		}
		if ($parentResponse->getParentResponse() instanceof ResponseInterface) {
			return $parentResponse->getParentResponse();
		}
		return $parentResponse;
	}

	/**
	 * @return boolean
	 */
	public function isMainResponse() {
		return $this->getMainResponse() === $this;
	}
}
