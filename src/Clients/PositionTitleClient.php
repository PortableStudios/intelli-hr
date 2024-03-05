<?php

namespace Portable\IntellihrApi\Clients;

use Portable\IntellihrApi\Data\PositionTitle;
use Portable\IntellihrApi\Client;

class PositionTitleClient extends Client
{
    protected $resourceClass = PositionTitle::class;
    protected $base = 'https://api.intellihr.io/v1/position-titles';
}
