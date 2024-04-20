<?php

namespace App\Http\Api\Modules\Employee\Filters;

use App\Http\Api\Modules\Employee\Interfaces\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class Email implements FilterInterface
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
        return $builder->where('email', 'LIKE', '%' . $value . '%');
    }
}
