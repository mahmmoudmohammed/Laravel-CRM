<?php

namespace App\Http\Api\Modules\Employee\Controllers;


use App\Http\Api\Modules\Employee\Filters\EmployeeFilter;
use App\Http\Api\Modules\Employee\Interfaces\EmployeeInterface;
use App\Http\Api\Modules\Employee\Models\Employee;
use App\Http\Api\Modules\Employee\Requests\CreateEmployeeRequest;
use App\Http\Api\Modules\Employee\Requests\UpdateEmployeeRequest;
use App\Http\Api\Modules\Employee\Resources\EmployeeResource;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmployeeController extends BaseController
{
    public function __construct(private EmployeeInterface $repository)
    {
    }

    public function index(Request $request)
    {
        $query = EmployeeFilter::apply($request);
        $models = $this->repository->list($query);
        if (!$models)
            return $this->error(__('common.not_found'), 203);

        return $this->responseResource(
            EmployeeResource::collection($models)
        );
    }

    public function store(CreateEmployeeRequest $request)
    {
        $data = $request->validated();
        $data['is_intern'] = true;
        $model = $this->repository->create($data);
        if (!$model)
            return $this->error(__('common.error'), 500);

        return $this->responseResource(
            EmployeeResource::make($model),
            status: 201
        );
    }

    public function show(Employee $model): JsonResponse
    {
        return $this->responseResource(
            EmployeeResource::make($model),
        );
    }

    public function update(UpdateEmployeeRequest $request)
    {
        $model = $this->repository->create($request->validated());
        if (!$model)
            return $this->error(__('common.error'), 500);

        return $this->responseResource(
            EmployeeResource::make($model),
        );
    }

    public function destroy(Employee $model): JsonResponse
    {
        return $this->repository->delete($model->id) ?
            $this->error(__('common.error'), 500) : $this->success();
    }

    public function internedEmployees(): JsonResponse
    {
        return $this->responseResource(
            EmployeeResource::collection($this->repository->internedEmployees()),
        );
    }
}
