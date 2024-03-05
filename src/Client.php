<?php

namespace Portable\IntellihrApi;

use Portable\IntellihrApi\Traits\FiltersResources;
use Portable\IntellihrApi\Traits\ListsResources;
use Portable\IntellihrApi\Traits\RetrievesResource;

class Client
{
    use FiltersResources;
    use ListsResources;
    use RetrievesResource;

    protected $base = 'https://api.intellihr.io/v1';

    protected $_clients = [];

    public function __construct(public $tenant, public $token)
    {
    }

    public function businessEntities()
    {
        if (! isset($this->_clients['businessEntities'])) {
            $this->_clients['businessEntities'] = new Clients\BusinessEntityClient($this->tenant, $this->token);
        }

        return $this->_clients['businessEntities'];
    }

    public function positionTitles()
    {
        if (! isset($this->_clients['positionTitles'])) {
            $this->_clients['positionTitles'] = new Clients\PositionTitleClient($this->tenant, $this->token);
        }

        return $this->_clients['positionTitles'];
    }

    public function jobs()
    {
        if (! isset($this->_clients['jobs'])) {
            $this->_clients['jobs'] = new Clients\JobClient($this->tenant, $this->token);
        }

        return $this->_clients['jobs'];
    }

    public function people()
    {
        if (! isset($this->_clients['people'])) {
            $this->_clients['people'] = new Clients\PeopleClient($this->tenant, $this->token);
        }

        return $this->_clients['people'];
    }

    public function getHeaders()
    {
        return [
            'Authorization' => 'Bearer '.$this->token,
            'Tenant' => $this->tenant,
        ];
    }

    public function getRequest($uri, $query = [])
    {
        if (app()->environment('local')) {
            $cache = base64_encode($uri);
            if (! file_exists(storage_path('app/cache'))) {
                mkdir(storage_path('app/cache'));
            }
            if (file_exists(storage_path('app/cache/'.$cache))) {
                //        return json_decode(file_get_contents(storage_path('app/cache/' . $cache)));
            }
        }
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $uri, [
            'headers' => $this->getHeaders(),
            'query' => $query,
        ]);

        $body = $response->getBody();
        if (app()->environment('local')) {
            file_put_contents(storage_path('app/cache/'.$cache), $body);
        }

        return json_decode($body);
    }
}
