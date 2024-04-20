<?php

namespace App\Http\Api\Modules\Employee\Filters;

use App\Http\Api\Modules\Employee\Interfaces\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class SortStartDate implements FilterInterface
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value): Builder
    {
        $sortType = match ($value){
            'up'=> 'asc',
            default =>'desc'
        };
        return $builder->orderBy('started_at', $sortType);
    }
}
