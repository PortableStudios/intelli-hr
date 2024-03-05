<?php

namespace Portable\IntellihrApi\Data;

use Spatie\LaravelData\Data;

class UserAccount extends Data
{
    public function __construct(
        public string $id,
        public string $username,
        public bool $isEnabled,
    ) {
    }
}
