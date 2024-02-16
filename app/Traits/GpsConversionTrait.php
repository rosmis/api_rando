<?php

declare(strict_types=1);

namespace App\Traits;

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
}