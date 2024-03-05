<?php

namespace Portable\IntellihrApi\Clients;

use Portable\IntellihrApi\Data\BusinessEntity;
use Portable\IntellihrApi\Client;

class BusinessEntityClient extends Client
{
    protected $resourceClass = BusinessEntity::class;
    protected $base = 'https://api.intellihr.io/v1/business-entities';
}
