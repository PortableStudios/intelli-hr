<?php

namespace Portable\IntellihrApi\Traits;

use stdClass;

trait FiltersResources
{
    protected $resourceClass = stdClass::class;

    public function search($filters = [])
    {
        $passingFilters = [];
        foreach ($filters as $fieldName => $value) {
            $passingFilters['filters['.$fieldName.'][eq]'] = $value;
        }
        $data = $this->getRequest($this->base, $passingFilters);

        return $this->resourceClass::collection($data->data);
    }
}
