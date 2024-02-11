<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\CreateHikeAction;
use App\Dto\CreateHikeDto;
use App\Models\Hike;

class HikesService
{
    public function store(CreateHikeDto $hikeDto): Hike
    {
        return app()->call(CreateHikeAction::class, ['hikeDto' => $hikeDto]);
    }
}