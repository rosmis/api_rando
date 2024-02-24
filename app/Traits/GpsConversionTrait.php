<?php

declare(strict_types=1);

namespace App\Traits;

use App\Dto\HikeMinMaxGpsCoordinatesDto;
use App\Dto\HikeQueryDto;
use Illuminate\Support\Collection;

trait GpsConversionTrait
{
    /**
     * @return Collection<string,string>
     */
    public function convertCoordinates(string $coordinateString): Collection
    {
        // Split the coordinate string into latitude and longitude parts
        $parts = explode(' / ', $coordinateString);

        // Extract latitude and longitude from parts
        $latitude = $this->extractCoordinateValue($parts[0]);
        $longitude = $this->extractCoordinateValue($parts[1]);

        return collect([
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }

    protected function extractCoordinateValue(string $part): ?float
    {
        // Extract numerical value from the coordinate part
        preg_match('/[+-]?\d+\.\d+/', $part, $matches);
        if (!empty($matches)) {
            return (float)$matches[0];
        }
        return null;
    }

    public function getMinMaxGpsCoordinatesRadius(HikeQueryDto $query): HikeMinMaxGpsCoordinatesDto
    {
        $earthRadius = 6371; // Earth's radius in kilometers
        $deltaLat = $query->radius / $earthRadius;
        $deltaLon = rad2deg(asin(sin(deg2rad($deltaLat)) / cos(deg2rad($query->latitude))));

        $minLat = $query->latitude - $deltaLat;
        $maxLat = $query->latitude + $deltaLat;
        $minLon = $query->longitude - $deltaLon;
        $maxLon = $query->longitude + $deltaLon;

        return HikeMinMaxGpsCoordinatesDto::fromArray([$maxLat, $minLat, $minLon, $maxLon]);
    }
}