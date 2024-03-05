<?php

namespace Portable\IntellihrApi\Data;

use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Portable\IntellihrApi\Data\MedicalCondition;
use Portable\IntellihrApi\Data\EmailAddress;
use Illuminate\Support\Carbon;

class Person extends Data
{
    public function __construct(
        public string $id,
        public string $displayName,
        public ?string $firstName,
        public ?string $middleName,
        public string $lastName,
        public ?string $preferredName,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d')]
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        public ?Carbon $dateOfBirth,
        public string $gender,
        public bool $isSupervisor,
        public ?string $employeeNumber,
        public string $autoIncrementIntellihrId,
        public ?string $title,
        #[DataCollectionOf(MedicalCondition::class)]
        public ?DataCollection $medicalConditions,
        #[DataCollectionOf(EmailAddress::class)]
        public ?DataCollection $emailAddresses,
        public ?EmergencyContact $emergencyContact,
        public string $employmentStatus,
        #[DataCollectionOf(Job::class)]
        public ?DataCollection $jobs,
        public ?EmailAddress $primaryEmailAddress,
        public ?PhoneNumber $primaryPhoneNumber,
        #[DataCollectionOf(Address::class)]
        public ?DataCollection $addresses,
        #[DataCollectionOf(PhoneNumber::class)]
        public ?DataCollection $phoneNumbers,
        public ?UserAccount $userAccount,
        #[DataCollectionOf(CustomFieldValue::class)]
        public ?DataCollection $customFields,
    ) {
    }
}
