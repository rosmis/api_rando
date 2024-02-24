<?php

declare(strict_types=1);

namespace App\Actions;

use App\Dto\HikeQueryDto;
use App\Models\Hike;
use App\Traits\GpsConversionTrait;
use App\Traits\HaversineTrait;
use Illuminate\Support\Collection;

class ListHikesAction
{
    use HaversineTrait;
    use GpsConversionTrait;

    /**
     * @return Collection<int,Hike>
     */
    public function __invoke(HikeQueryDto $query): Collection
    {

        $minMaxCoordinates = $this->getMinMaxGpsCoordinatesRadius($query);

        /** @var Collection<int,Hike> */
        $hikes = Hike::query()
            ->withBetweenGpsLocations($minMaxCoordinates)
            ->with('images')
            ->paginate(10);

        $filteredHikes = $hikes->filter(function ($hike) use ($query) {
            $distance = $this->haversine(
                $query->latitude, $query->longitude, $hike->latitude, $hike->longitude
            );

            return $distance <= $query->radius;
        });

        return $filteredHikes;
    }
}