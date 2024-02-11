<?php

declare(strict_types=1);

namespace App\Actions;

use App\Dto\CreateHikeDto;
use App\Models\Hike;

class CreateHikeAction
{
    public function __invoke(CreateHikeDto $hikeDto): Hike
    {
        return Hike::query()
            ->create([
                'title' => $hikeDto->title,
                'excerpt' => $hikeDto->excerpt,
                'description' => $hikeDto->description,
                'activity_type' => $hikeDto->activityType,
                'difficulty' => $hikeDto->difficulty,
                'distance' => $hikeDto->distance,
                'duration' => $hikeDto->duration,
                'positive_elevation' => $hikeDto->positiveElevation,
                'negative_elevation' => $hikeDto->negativeElevation,
                'municipality' => $hikeDto->municipality,
                'highest_point' => $hikeDto->highestPoint,
                'lowest_point' => $hikeDto->lowestPoint,
                'location' => $hikeDto->location,
                'ign_reference' => $hikeDto->ignReference,
                'ign_url' => $hikeDto->ignUrl,
                'is_return_starting_point' => $hikeDto->isReturnStartingPoint,
            ]);
    }
}