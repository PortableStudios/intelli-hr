<?php

namespace Portable\IntellihrApi\Data;

use Spatie\LaravelData\Data;

class Address extends Data
{
    public function __construct(
        public string $addressType,
        public string $fullAddress,
        public string $country,
        public string $postcode,
        public string $state,
        public string $street,
        public string $suburb,
        public bool $isPrimary,
    ) {
    }
}
