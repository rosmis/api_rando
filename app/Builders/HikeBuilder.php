<?php

declare(strict_types=1);

namespace App\Builders;

use App\Dto\HikeQueryDto;
use App\Models\Hike;
use Illuminate\Database\Eloquent\Builder;

/**
 * @template TModelClass of Hike
 *
 * @extends Builder<TModelClass>
 */
class HikeBuilder extends Builder
{
    public function withEssentialColumns(): self
    {
        return $this->select(
            ['id', 'title', 'difficulty', 'latitude', 'longitude', 'distance', 'duration', 'municipality', 'highest_point', 'lowest_point']
        );
    }

    public function withCoordinatesRadius(HikeQueryDto $query): self
    {
        return $this
            ->selectRaw(
                '(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS hikeDistance',
                [$query->latitude, $query->longitude, $query->latitude]
            )
            ->having('hikeDistance', '<', $query->radius)
            ->orderBy('hikeDistance');
    }

}
