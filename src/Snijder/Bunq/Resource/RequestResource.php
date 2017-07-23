<?php
namespace Snijder\Bunq\Resource;


use Snijder\Bunq\BunqClient;
use Snijder\Bunq\Model\Request;

class RequestResource implements ResourceInterface
{
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
    private $monetaryAccountId;

    /**
     * RequestResource constructor.
     *
     * @param BunqClient $BunqClient
     * @param $userIdentifier
     * @param $monetaryAccountId
     */
    public function __construct(BunqClient $BunqClient, $userIdentifier, $monetaryAccountId)
    {
        $this->BunqClient = $BunqClient;
        $this->userIdentifier = $userIdentifier;
        $this->monetaryAccountId = $monetaryAccountId;
    }

    /**
     * Lists all payment requests for a user's monetary account.
     *
     * @return array
     */
    public function listRequests()
    {
        return $this->BunqClient->getHttpService()->get(
            $this->getResourceEndpoint()
        );
    }

    /**
     * Get the details of a specific payment request, including its status.
     *
     * @param $id
     * @return array
     */
    public function getRequest($id)
    {
        return $this->BunqClient->getHttpService()->get(
            $this->getResourceEndpoint() . "/" . $id
        );
    }

    /**
     * Create a new payment request.
     *
     * @param Request $request
     * @return array
     */
    public function createRequest(Request $request)
    {
        $options = [
            'json' => array(
                "amount_inquired" => array(
                    "value" => $request->getAmount(),
                    "currency" => $request->getCurrency()
                ),
                "counterparty_alias" => array(
                    "type" => $request->getCounterPart()->getType(),
                    "value" => $request->getCounterPart()->getValue(),
                    "name" => $request->getCounterPart()->getName()
                ),
                "description" => $request->getDescription(),
                "allow_bunqme" => $request->isAllowBunqme(),
                "redirect_url" => $request->getRedirectUrl()
            )
        ];

        return $this->BunqClient->getHttpService()->post(
            $this->getResourceEndpoint(),
            $options
        );
    }

    /**
     * Returns the resource endpoint.
     *
     * @return string
     */
    public function getResourceEndpoint(): string
    {
        return "/v1/user/" . $this->userIdentifier . "/monetary-account/" . $this->monetaryAccountId . "/request-inquiry";
    }
}