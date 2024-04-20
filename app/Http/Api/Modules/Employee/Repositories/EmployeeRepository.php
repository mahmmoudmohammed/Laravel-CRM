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
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function list(Builder $builder): LengthAwarePaginator|false
    {
        return $builder->with('company.media')->latest()
            ->paginate($this::paginationLimit(request('per_page', config('app.pagination'))));
    }

    public function internedEmployees(): LengthAwarePaginator|false
    {
        return $this->model()::where('is_intern', true)
            ->with('company.media')->latest()
            ->paginate($this::paginationLimit(request('per_page', config('app.pagination'))));
    }
}
