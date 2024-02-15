<?php

declare(strict_types=1);

namespace App\Actions;

use App\Dto\CreateHikeDto;
use App\Models\Hike;
use App\Models\HikeImage;

class CreateHikeAction
{
    public function __invoke(CreateHikeDto $hikeDto): Hike
    {
        $hike = Hike::query()
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
                'hike_url' => $hikeDto->hikeUrl,
                'gpx_url' => $hikeDto->gpxUrl,
                'is_return_starting_point' => $hikeDto->isReturnStartingPoint,
            ]);

        $hikeImagesCollection = collect($hikeDto->imagesUrl);

        $hikeImagesCollection->each(function (string $imageUrl) use ($hike) {
            HikeImage::query()
                ->create([
                    'hike_id' => $hike->id,
                    'image_url' => $imageUrl,
                ]);
        });

        return $hike;
    }
}