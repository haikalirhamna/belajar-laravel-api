<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Blog\StoreRequest;
use App\Http\Repositories\Api\BlogRepository;
use App\Http\Requests\Api\Blog\UpdateRequest;

class BlogController extends Controller
{
    public function showAll() {
        return $this->transactionData(
            BlogRepository::showAll()
        );
    }

    public function show(Blog $blog) {
        return $this->transactionData(
            BlogRepository::show($blog)
        );
    }

    public function store(StoreRequest $request) {
        return $this->transactionData(
            BlogRepository::store($request->validated())
        );
    }

    public function update(Blog $blog, UpdateRequest $request) {
        return $this->transactionData(
            BlogRepository::update($blog, $request->validated())
        );
    }

    public function delete(Blog $blog) {
        return $this->transactionData(
            BlogRepository::delete($blog)
        );
    }

    public function deleteAll() {
        return $this->transactionData(
            BlogRepository::deleteAll()
        );
    }
}
