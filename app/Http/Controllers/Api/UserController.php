<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UserRequest;
use App\Http\Requests\Api\User\LoginRequest;
use App\Http\Repositories\Api\UserRepository;
use App\Http\Requests\Api\User\UpdateRequest;

class UserController extends Controller
{
    public function register(UserRequest $request) {
        return $this->transactionData(
            UserRepository::register($request->validated())
        );
    }

    public function login(LoginRequest $request) {
        return $this->transactionData(
            UserRepository::login($request->validated())
        );
    }

    public function update(UpdateRequest $request) {
        return $this->transactionData(
            UserRepository::update($request->validated())
        );
    }
}
