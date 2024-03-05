<?php

namespace Portable\IntellihrApi\Data;

use Spatie\LaravelData\Data;

class EmailAddress extends Data
{
    public function __construct(
        public string $email,
        public ?bool $isPrimary,
        public ?bool $isPersonal,
    ) {
    }
}
