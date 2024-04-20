<?php

namespace App\Http\Api\Modules\Admin\Controllers;


use App\Exceptions\CustomValidationException;
use App\Http\Api\Modules\Admin\Interfaces\AdminInterface;
use App\Http\Api\Modules\Admin\Requests\AdminLoginRequest;
use App\Http\Api\Modules\Admin\Resources\AdminResource;
use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;


class AdminLoginController extends BaseController
{
    public function __construct(private AdminInterface $repository)
    {
    }

    /**
     * Login for admin.
     *
     * @param AdminLoginRequest $request Incoming request.
     *
     * @return AdminResource
     */
    public function login(AdminLoginRequest $request): AdminResource
    {
        $user = $this->repository->login($request->validated());

        return (new AdminResource($user))->additional([
            'token' => $user->createToken($request->ip())->plainTextToken
        ]);
    }

    /**
     * @throws CustomValidationException
     */
    public function logout(): JsonResponse
    {
        if ($this->repository->logout('admin'))
            return $this->success();
        return $this->error(__('error.logout_error'), 500);
    }

}
