<?php

declare(strict_types=1);

namespace App\Actions;

use App\Dto\HikeQueryDto;
use App\Models\Hike;
use App\Traits\HaversineTrait;
use Illuminate\Support\Collection;

class ListHikesAction
{
    use HaversineTrait;

    /**
     * @return Collection<int,Hike>
     */
    public function __invoke(HikeQueryDto $query): Collection
    {

        $earthRadius = 6371; // Earth's radius in kilometers
        $deltaLat = $query->radius / $earthRadius;
        $deltaLon = rad2deg(asin(sin(deg2rad($deltaLat)) / cos(deg2rad($query->latitude))));
        $minLat = $query->latitude - $deltaLat;
        $maxLat = $query->latitude + $deltaLat;
        $minLon = $query->longitude - $deltaLon;
        $maxLon = $query->longitude + $deltaLon;

        /** @var Collection<int,Hike> */
        $hikes = Hike::query()
            ->whereBetween('latitude', [$minLat, $maxLat])
            ->whereBetween('longitude', [$minLon, $maxLon])
            ->with('images')
            ->get();

        $filteredHikes = $hikes->filter(function ($hike) use ($query) {
            $distance = $this->haversine(
                $query->latitude, $query->longitude, $hike->latitude, $hike->longitude
            );

            return $distance <= $query->radius;
        });

        return $filteredHikes;
    }
}