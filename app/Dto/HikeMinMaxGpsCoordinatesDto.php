<?php

declare(strict_types=1);

namespace App\Dto;

final class HikeMinMaxGpsCoordinatesDto
{
    public function __construct(
        public float $minLat,
        public float $maxLat,
        public float $minLon,
        public float $maxLon,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            minLat: $data['minLat'],
            maxLat: $data['maxLat'],
            minLon: $data['minLon'],
            maxLon: $data['maxLon'],
        );
    }
}