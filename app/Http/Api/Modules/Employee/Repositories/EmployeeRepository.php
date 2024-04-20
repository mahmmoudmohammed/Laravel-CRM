<?php

namespace App\Http\Api\Modules\Employee\Repositories;

use App\Http\Api\Modules\BaseRepository;
use App\Http\Api\Modules\Employee\Interfaces\EmployeeInterface;
use App\Http\Api\Modules\Employee\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository extends BaseRepository implements EmployeeInterface
{
    protected function model(): string
    {
        return Employee::class;
    }

    public function create($data): Employee|bool
    {
        return parent::create([
            'first_name'  => $data['first_name'],
            'last_name'   => $data['last_name'],
            'email'       => $data['email'],
            'phone'       => $data['phone'],
            'is_intern'   => $data['is_intern'],
            'started_at'  => $data['started_at'],
            'company_id'  => $data['company_id'],
            'password'    => Hash::make($data['password'])
        ]);
    }

    public function list(Builder $builder): LengthAwarePaginator|false
    {
        return $builder->with('company.media')->latest()
            ->paginate($this::paginationLimit(request('per_page', config('app.pagination'))));
    }

}
