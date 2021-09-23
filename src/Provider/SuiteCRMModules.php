<?php

namespace Chadhutchins\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class SuiteCRMModules implements ResourceOwnerInterface
{
    use ArrayAccessorTrait;
    
    /**
     * @var array
     */
    protected $response;

    /**
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function getId()
    {
        return $this->getValueByKey($this->response, 'encoded_account_id');
    }

    /**
     * Get account name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getValueByKey($this->response, 'organization_name');
    }

}
