<?php

namespace Portable\IntellihrApi\Data;

use stdClass;
use Spatie\LaravelData\PaginatedDataCollection;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\CursorPaginatedDataCollection;
use Illuminate\Support\Enumerable;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\AbstractCursorPaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Pagination\CursorPaginator;

class CustomFieldValue extends Data
{
    public function __construct(
        public string $definitionId,
        public string $name,
        public string $label,
        public string $type,
        public stdClass|string|null $value,
    ) {
    }

    public static function collection(stdClass|Enumerable|array|AbstractPaginator|Paginator|AbstractCursorPaginator|CursorPaginator|DataCollection|null $items): DataCollection|CursorPaginatedDataCollection|PaginatedDataCollection
    {
        if (get_class($items)!== 'stdClass') {
            return parent::collection($items);
        }

        $newItems = [];
        foreach ($items as $name => $object) {
            $newItems[] = [
                'definitionId' => $object->definitionId,
                'name' => $name,
                'label' => $object->name,
                'type' => $object->type,
                'value' => $object->value,
            ];
        }

        return parent::collection($newItems);
    }
}
