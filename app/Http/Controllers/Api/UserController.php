<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Api\UserRepository;
use App\Http\Requests\Api\User\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(UserRequest $request) {
        return $this->transactionData(
            UserRepository::register($request->validated())
        );
    }
}
