<?php

namespace App\Http\Api\Modules\Company\Controllers;

use App\Http\Api\Modules\Company\Filters\CompanyFilter;
use App\Http\Api\Modules\Company\Interfaces\CompanyInterface;
use App\Http\Api\Modules\Company\Models\Company;
use App\Http\Api\Modules\Company\Requests\CreateCompanyRequest;
use App\Http\Api\Modules\Company\Requests\UpdateCompanyRequest;
use App\Http\Api\Modules\Company\Resources\CompanyResource;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CompanyController extends BaseController
{
    public function __construct(private CompanyInterface $repository)
    {
    }

    public function index(Request $request)
    {
        $query = CompanyFilter::apply($request);
        $models = $this->repository->list($query);
        if (!$models)
            return $this->error(__('common.not_found'), 203);

        return $this->responseResource(
            CompanyResource::collection($models)
        );
    }

    public function store(CreateCompanyRequest $request): JsonResponse
    {
        $model = $this->repository->create($request->validated());
        if (!$model)
            return $this->error(__('common.error'), 500);

        if ($request->hasFile('logo') && $request->file('logo')->isValid())
            $this->repository->associateMedia($model);

        return $this->responseResource(
            CompanyResource::make($model->load('media')),
            status: 201
        );
    }
    public function update(UpdateCompanyRequest $request,$model): JsonResponse
    {
        $model = $this->repository->update($model,$request->validated());
        if (!$model)
            return $this->error(__('common.error'), 500);

        if ($request->hasFile('logo') && $request->file('logo')->isValid())
            $this->repository->associateMedia($model);

        return $this->responseResource(
            CompanyResource::make($model->load('media')),
        );
    }

    public function show(Company $model): JsonResponse
    {
        return $this->responseResource(
            CompanyResource::make($model->load(['media','employees'])),
        );
    }

    public function destroy(Company $model): JsonResponse
    {
        return $this->repository->delete($model->id) ?
            $this->error(__('common.error'), 500) : $this->success();
    }

}
