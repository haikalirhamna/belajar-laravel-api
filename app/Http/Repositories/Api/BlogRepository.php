<?php

namespace App\Http\Repositories\Api;

use Attribute;
use Exception;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

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

            // $blog->image = Storage::url($blog->image);

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
        $user = auth('user')->user();

        $blog = $user->blogs()->create($data);

        $image_path = Storage::put('blogs/'.$blog->id, $data['image']); 

        $blog->image = $image_path;
        $blog->save();

        return response()->json([
            'message' => 'Blog berhasil dibuat'
        ]);
    }

    public static function update(Blog $blog, array $data) {
        if (auth()->id() === $blog->user_id) {
            if (isset($data['image'])){
                // getRawOriginal untuk mendapatkan value asli/path
                Storage::delete($blog->getRawOriginal('image'));
                $image_path = Storage::put('blogs/'.$blog->id, $data['image']);
                $data['image'] = $image_path;
            }
            $blog->update($data);

            return response()->json([
                'message' => 'Blog berhasil diubah'
            ]);
        } else {
            return response()->json([
                'message' => 'Blog ini bukan milik anda'
            ], 403);
        }
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
