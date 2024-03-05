<?php

namespace Portable\IntellihrApi\Traits;

use stdClass;

trait ListsResources
{
    protected $resourceClass = stdClass::class;

    public function list($page = 1, $limit = 100)
    {
        $data =  $this->getRequest($this->base, [
            'page' => $page,
            'limit' => $limit
        ]);
        return $this->resourceClass::collection($data->data);
    }

    public function listAll()
    {
        $page = 1;
        $resources = [];

        do {
            $data =  $this->getRequest($this->base, [
                'page' => $page,
                'limit' => 100
            ]);
            $resources = array_merge($resources, $data->data);
            $page++;
        } while ($page <= $data->meta->pagination->total_pages) ;

        return $this->resourceClass::collection($resources);
    }
}
