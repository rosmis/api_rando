<?php

declare(strict_types=1);

namespace App\Dto;

final class CreateHikeDto
{
    public function __construct(
        public string $title,
        public string $excerpt,
        public string $description,
        public string $activityType,
        public string $difficulty,
        public int $distance,
        public string $duration,
        public int $positiveElevation,
        public int $negativeElevation,
        public string $municipality,
        public int $highestPoint,
        public int $lowestPoint,
        public string $location,
        public ?string $ignReference,
        public ?string $hikeUrl,
        public string $gpxUrl,
        public bool $isReturnStartingPoint,
        public ?array $imagesUrl,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            excerpt: $data['excerpt'],
            description: $data['description'],
            activityType: $data['activity_type'],
            difficulty: $data['difficulty'],
            distance: $data['distance'],
            duration: $data['duration'],
            positiveElevation: $data['positive_elevation'],
            negativeElevation: $data['negative_elevation'],
            municipality: $data['municipality'],
            highestPoint: $data['highest_point'],
            lowestPoint: $data['lowest_point'],
            location: $data['location'],
            ignReference: $data['ign_reference'] ?? null,
            hikeUrl: $data['hike_url'] ?? null,
            gpxUrl: $data['gpx_url'],
            isReturnStartingPoint: $data['is_return_starting_point'],
            imagesUrl: $data['images_url'] ?? null,
        );
    }
}