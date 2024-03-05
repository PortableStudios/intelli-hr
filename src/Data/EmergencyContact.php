<?php

namespace Portable\IntellihrApi\Data;

use Spatie\LaravelData\Data;

class EmergencyContact extends Data
{
    public function __construct(
        public string $name,
        public string $relationship,
        public ?string $phone,
        public ?string $email,
    ) {
    }
}
