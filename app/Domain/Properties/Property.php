<?php

declare(strict_types=1);

namespace App\Domain\Properties;

/**
 * @DTO
 */
class Property
{
    public function __construct(
        public readonly string $name,
        public readonly int $price,
        public readonly int $bedrooms,
        public readonly int $bathrooms,
        public readonly int $storeys,
        public readonly int $garages
    ) { }
}
