<?php

declare(strict_types=1);

namespace App\Builders;

use App\Dto\HikeMinMaxGpsCoordinatesDto;
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
            ['id', 'title', 'difficulty', 'excerpt', 'location', 'activity_type', 'distance', 'duration']
        );
    }

    public function withBetweenGpsLocations(
        HikeMinMaxGpsCoordinatesDto $coordinates
    ): self {
        //TODO test this shit cuz i don't have separate long lat cols in the table
        return $this
            ->whereBetween('latitude', [$coordinates->minLat, $coordinates->maxLat])
            ->whereBetween('longitude', [$coordinates->minLon, $coordinates->maxLon]);
    }

}
