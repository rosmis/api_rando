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
            ['id', 'title', 'difficulty', 'excerpt', 'latitude', 'longitude', 'activity_type', 'distance', 'duration']
        );
    }

    public function withCoordinatesRadius(HikeQueryDto $query): self
    {
        return $this
            ->selectRaw(
                '(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
                [$query->latitude, $query->longitude, $query->latitude]
            )
            ->having('distance', '<', $query->radius)
            ->orderBy('distance');
    }

}
