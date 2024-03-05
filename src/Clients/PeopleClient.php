<?php

namespace Portable\IntellihrApi\Clients;

use Portable\IntellihrApi\Data\Person;

use Portable\IntellihrApi\Client;

class PeopleClient extends Client
{
    protected $resourceClass = Person::class;
    protected $base = 'https://api.intellihr.io/v1/people';

    public function profileImage($personId)
    {
        return $this->getRequest($this->base . '/' . $personId . '/images', ['imageType' => 'PERSON_PROFILE']);
    }
}
