<?php

namespace App\Http\Api\Modules\Company\Repositories;

use App\Http\Api\Modules\BaseRepository;
use App\Http\Api\Modules\Company\Interfaces\CompanyInterface;
use App\Http\Api\Modules\Company\Models\Company;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class CompanyRepository extends BaseRepository implements CompanyInterface
{
    protected function model(): string
    {
        return Company::class;
    }
    public function associateMedia(Company $company): void
    {
        $company->addMediaFromRequest('logo')->toMediaCollection('logos');
    }

    public function list(Builder $builder): LengthAwarePaginator|false
    {
        return $builder->with('media')->latest()
            ->paginate($this::paginationLimit(request('per_page', config('app.pagination'))));
    }

}
