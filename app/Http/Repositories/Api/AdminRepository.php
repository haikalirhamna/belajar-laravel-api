<?php

namespace App\Http\Repositories\Api;

use Exception;
use App\Models\Admin;

class AdminRepository
{
    public static function register(array $data) {
        $data['password'] = bcrypt($data['password']);

        Admin::create($data);

        return response()->json([
            'message' => 'Berhasil mendaftarkan admin'
        ]);
    }

    public static function login(array $data) {
        $token = auth('admin')->attempt($data);
        
        if ($token) {
            return response()->json([
                'message'=> 'Sukses login',
                'token' => $token
            ]);
        } else {
            return response()->json([
                'message' => 'Username atau Kata sandi salah',
            ], 422);
        }
    }

    public static function update(array $data) {
        $user = auth('admin')->user();

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return response()->json([
            'message' => 'Berhasil mengubah data',
        ]);

    }
}
