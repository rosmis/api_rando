<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Hike;
use Illuminate\Support\Collection;

class ListHikesAction
{
    /**
     * @return Collection<int,Hike>
     */
    public function __invoke(): Collection
    {
        return Hike::query()
            ->with('images')
            ->get();
    }
}