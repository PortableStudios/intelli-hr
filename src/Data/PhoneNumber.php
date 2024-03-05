<?php

namespace Portable\IntellihrApi\Data;

use Spatie\LaravelData\Data;

class PhoneNumber extends Data
{
    public function __construct(
        public string $number,
        public string $fullNumber,
        public ?bool $isPersonal,
    ) {
    }
}
