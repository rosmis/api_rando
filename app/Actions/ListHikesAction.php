<?php

declare(strict_types=1);

namespace App\Actions;

use App\Dto\HikeQueryDto;
use App\Models\Hike;
use Illuminate\Support\Collection;

class ListHikesAction
{
    /**
     * @return Collection<int,Hike>
     */
    public function __invoke(HikeQueryDto $query): Collection
    {
        /** @var Collection<int,Hike> */
        $hikes = Hike::query()
            ->withCoordinatesRadius($query)
            ->with('images')
            ->get();

        return $hikes;
    }
}