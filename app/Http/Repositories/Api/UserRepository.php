<?php

namespace App\Http\Repositories\Api;

use App\Models\User;

class UserRepository
{
    public static function register(array $data) {
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return response()->json([
            'message' => 'user berhasil ditambahkan'
        ]);
    }
}
