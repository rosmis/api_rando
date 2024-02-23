<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\HikeImage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HikeImageRessource extends JsonResource
{
    /**
     * @property HikeImage $resource
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'image_url' => $this->resource->image_url,
        ];
    }
}
