<?php

namespace Portable\IntellihrApi\Data;

use Spatie\LaravelData\Data;

class PositionTitle extends Data
{
    public string $id;

    public string $name;

    public ?bool $isEnabled;

    public ?string $code;
}
