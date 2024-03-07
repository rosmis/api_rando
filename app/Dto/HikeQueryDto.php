<?php

declare(strict_types=1);

namespace App\Dto;

final class HikeQueryDto
{
    public function __construct(
        public string|float $latitude,
        public string|float $longitude,
        public string|float $radius,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            latitude: (float) $data['latitude'],
            longitude: (float) $data['longitude'],
            radius: (float) $data['radius'],
        );
    }
}
