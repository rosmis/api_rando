<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Hike;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HikePreviewRessource extends JsonResource
{
    /**
     * @property Hike $resource
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'latitude' => $this->resource->latitude,
            'longitude' => $this->resource->longitude,
            'municipality' => $this->resource->municipality,
            'highest_point' => $this->resource->highest_point,
            'lowest_point' => $this->resource->lowest_point,
            'difficulty' => $this->resource->difficulty,
            'distance' => $this->resource->distance,
            'duration' => $this->resource->duration,
            'images' => $this->whenLoaded(
                'images',
                fn () => HikeImageRessource::collection($this->resource->images)
            )
        ];
    }
}
