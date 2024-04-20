<?php

namespace App\Http\Api\Modules\Admin\Controllers;


use App\Http\Api\Modules\Admin\Interfaces\AdminInterface;
use App\Http\Api\Modules\Admin\Requests\CreateAdminRequest;
use App\Http\Api\Modules\Admin\Resources\AdminResource;
use App\Http\Controllers\BaseController;


class AdminController extends BaseController
{
    public function __construct(private AdminInterface $repository)
    {
    }

    public function store(CreateAdminRequest $request)
    {
        $user = $this->repository->register($request->validated());
        if ($user)
            return $this->responseResource(AdminResource::make($user));
        return $this->error(__('common.error'), 500);
    }

    //TODO:: Admin Logic Layer

}
