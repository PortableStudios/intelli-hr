<?php

namespace Portable\IntellihrApi\Traits;

use stdClass;

trait RetrievesResource
{
    protected $resourceClass = stdClass::class;

    public function get($id)
    {
        $data = $this->getRequest($this->base.'/'.$id);

        return $this->resourceClass::from($data->data);
    }
}
