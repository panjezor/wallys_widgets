<?php

namespace App\Models;

use App\Enums\ActiveEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pack
 *
 * @package App\Models
 */
class Pack extends Model
{
    use HasFactory;

    /**
     * Status values constants
     */
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', static::STATUS_ACTIVE);
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeInactive(Builder $builder)
    {
        return $builder->where('active', static::STATUS_INACTIVE);
    }
}
