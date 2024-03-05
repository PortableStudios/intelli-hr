<?php

namespace Portable\IntellihrApi\Clients;

use Portable\IntellihrApi\Client;
use Portable\IntellihrApi\Data\Job;

class JobClient extends Client
{
    protected $resourceClass = Job::class;

    protected $base = 'https://api.intellihr.io/v1/jobs';
}
