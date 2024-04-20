<?php

namespace App\Http\Api\Modules\Company\Filters;

use App\Http\Api\Modules\Company\Models\Company;
use App\Http\Api\Traits\HasFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyFilter
{
    use HasFilter;

    /**
     * Applying filters on query based on request parameters
     * @param Request $filters
     * @return Builder
     */
    public static function apply(Request $filters)
    {
        $query = static::applyDecoratorsFromRequest($filters, (new Company)->newQuery());

        return static::getResults($query);
    }

    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\' . Str::studly($name);
    }
}
