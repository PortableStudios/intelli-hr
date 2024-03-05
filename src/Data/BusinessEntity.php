<?php

namespace Portable\IntellihrApi\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BusinessEntity extends Data
{
    public string $id;

    public string $name;

    public ?string $code;

    public ?string $legalName;

    public ?string $number;

    public ?bool $isEnabled;

    #[DataCollectionOf(CustomFieldValue::class)]
    public ?DataCollection $customFields;
}
