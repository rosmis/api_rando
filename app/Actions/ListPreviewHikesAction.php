<?php

declare(strict_types=1);

namespace App\Actions;

use App\Dto\HikeQueryDto;
use App\Models\Hike;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListPreviewHikesAction
{
    public function __invoke(HikeQueryDto $query): LengthAwarePaginator
    {
        $hikes = Hike::query()
            ->withEssentialColumns()
            ->withCoordinatesRadius($query)
            ->with('images')
            ->paginate(10);

        return $hikes;
    }
}