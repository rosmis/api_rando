<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\CreateHikeAction;
use App\Actions\ListHikesAction;
use App\Dto\CreateHikeDto;
use App\Models\Hike;
use Illuminate\Support\Collection;

class HikesService
{
    /**
     * @return Collection<int,Hike>
     */
    public function list(): Collection
    {
        return app()->call(ListHikesAction::class);
    }

    public function store(CreateHikeDto $hikeDto): Hike
    {
        return app()->call(CreateHikeAction::class, ['hikeDto' => $hikeDto]);
    }
}