<?php

namespace Portable\IntellihrApi\Data;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class Job extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        #[WithCast(DateTimeInterfaceCast::class, format: DATE_ATOM)]
        public Carbon $startDate,
        #[WithCast(DateTimeInterfaceCast::class, format: DATE_ATOM)]
        public ?Carbon $endDate,
        public string $jobStatus,
        public ?bool $isOnExtendedLeave,
        public ?bool $isPrimaryJob,
        public ?string $link,
        public ?PositionTitle $position,
        public ?BusinessUnit $businessUnit,
        public ?BusinessEntity $businessEntity,
        public ?PositionTitle $positionTitle,
    ) {
        if ($positionTitle && ! $position) {
            $this->position = $positionTitle;
        }
    }
}
