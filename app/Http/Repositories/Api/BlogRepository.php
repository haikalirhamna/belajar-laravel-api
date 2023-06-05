<?php

namespace App\Http\Repositories\Api;

use Attribute;
use Exception;
use App\Models\Blog;

class BlogRepository
{
    public static function showAll() {
        $User = auth('user')->user();

        $blogs = $User->blogs()->get();
        return response()->json(
            compact('blogs')
        );
    }

    public static function show(Blog $blog) {
        if ($blog->user_id === auth('user')->id()) {
            return response()->json(
                compact('blog')
            );
        } else {
            return response()->json([
                'message' => 'Blog ini bukan milik anda'
            ], 403);
        }
    }

    public static function store(array $data) {

    }

    public static function update(Blog $blog, array $data) {

    }

    public static function delete(Blog $blog) {
        if ($blog->user_id === auth('user')->id()) {

            $blog->delete();

            return response()->json([
                'message' => 'Blog sudah dihapus'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Blog ini bukan milik anda'
            ], 403);
        }
    }

    public static function deleteAll() {
        $User = auth('user')->user();

        $User->blogs()->delete();

        return response()->json([
            'message' => 'Semua blog sudah dihapus'
        ]);
    }
}
