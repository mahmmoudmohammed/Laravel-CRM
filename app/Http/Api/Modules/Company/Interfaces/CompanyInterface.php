<?php

namespace App\Http\Api\Modules\Company\Interfaces;

use App\Http\Api\Modules\Company\Models\Company;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

use Illuminate\Database\Eloquent\Builder;

interface CompanyInterface
{
    //TODO::Signature of methods which must to be implemented
    public function associateMedia(Company $company): void;

    public function list(Builder $builder): LengthAwarePaginator|false;

}
