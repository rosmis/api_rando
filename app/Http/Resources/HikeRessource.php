<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Hike;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HikeRessource extends JsonResource
{
    /**
     * @property Hike $resource
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'excerpt' => $this->resource->excerpt,
            'description' => $this->resource->description,
            'activity_type' => $this->resource->activity_type,
            'difficulty' => $this->resource->difficulty,
            'distance' => $this->resource->distance,
            'duration' => $this->resource->duration,
            'positive_elevation' => $this->resource->positive_elevation,
            'negative_elevation' => $this->resource->negative_elevation,
            'municipality' => $this->resource->municipality,
            'highest_point' => $this->resource->highest_point,
            'lowest_point' => $this->resource->lowest_point,
            'latitude' => $this->resource->latitude,
            'longitude' => $this->resource->longitude,
            'ign_reference' => $this->resource->ign_reference,
            'hike_url' => $this->resource->hike_url,
            'gpx_url' => $this->resource->gpx_url,
            'is_return_starting_point' => $this->resource->is_return_starting_point,
            'images' => $this->whenLoaded(
                'images',
                fn () => HikeImageRessource::collection($this->resource->images)
            )
        ];
    }
}
