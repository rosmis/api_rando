<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\CreateHikeAction;
use App\Actions\ListHikeAction;
use App\Actions\ListHikesAction;
use App\Actions\ListPreviewHikesAction;
use App\Dto\CreateHikeDto;
use App\Dto\HikeQueryDto;
use App\Models\Hike;
use Illuminate\Support\Collection;

class HikesService
{
    /**
     * @return Collection<int,Hike>
     */
    public function list(HikeQueryDto $query): Collection
    {
        return app()->call(ListHikesAction::class, ['query' => $query]);
    }

    /**
     * @return Collection<int,Hike>
     */
    public function listPreview(HikeQueryDto $query): Collection
    {
        return app()->call(ListPreviewHikesAction::class, ['query' => $query]);
    }

    public function show(int $id): Hike
    {
        return app()->call(ListHikeAction::class, ['id' => $id]);
    }

    public function store(CreateHikeDto $hikeDto): Hike
    {
        return app()->call(CreateHikeAction::class, ['hikeDto' => $hikeDto]);
    }
}