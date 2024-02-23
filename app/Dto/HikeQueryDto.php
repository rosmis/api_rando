<?php

declare(strict_types=1);

namespace App\Dto;

final class HikeQueryDto
{
    public function __construct(
        public float $latitude,
        public float $longitude,
        public float $radius,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            latitude: $data['latitude'],
            longitude: $data['longitude'],
            radius: $data['radius'],
        );
    }
}
