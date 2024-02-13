<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Attributes
 * @property int $id
 * @property int $hike_id
 * @property string $image_url
 * @property string $created_at
 * @property string $updated_at
 * 
 * Relations
 * @property Hike $hike
 */
class HikeImage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function hike(): BelongsTo
    {
        return $this->belongsTo(Hike::class);
    }
}
