<?php

namespace App\Http\Controllers;

use App\Http\Api\Traits\ApiDesignTrait;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    use ApiDesignTrait;
}
