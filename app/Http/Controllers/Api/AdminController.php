<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\LoginRequest;
use App\Http\Repositories\Api\AdminRepository;
use App\Http\Requests\Api\Admin\UpdateRequest;
use App\Http\Requests\Api\Admin\RegisterRequest;

class AdminController extends Controller
{
    public function register(RegisterRequest $request) {
        return $this->transactionData(
            AdminRepository::register($request->validated())
        );
    }

    public function login(LoginRequest $request) {
        return $this->transactionData(
            AdminRepository::login($request->validated())
        );
    }

    public function update(UpdateRequest $request) {
        return $this->transactionData(
            AdminRepository::update($request->validated())
        );
    }
}
