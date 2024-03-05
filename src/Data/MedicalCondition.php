<?php

namespace Portable\IntellihrApi\Data;

use Spatie\LaravelData\Data;

class MedicalCondition extends Data
{
    public function __construct(
        public string $id,
        public string $body,
        public bool $isPublic
    ) {
    }
}
