<?php

namespace App\Http\Api\Modules\Employee\Interfaces;

use App\Http\Api\Modules\Employee\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

interface EmployeeInterface
{
    public function create($data): Employee|bool;
    public function list(Builder $builder): LengthAwarePaginator|false;
}
