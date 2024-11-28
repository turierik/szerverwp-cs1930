<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class ApiController extends Controller
{
    public function index(){
        return Post::with('user') -> get();
    }

    public function show(int $post){
        $p = Post::find($post);
        if (!$p){
            return response(["errors" => ["Post not found."]], 404);
        }
        return $p;
    }

    public function store(Request $request){
        $validated = $request -> validate([
            'title' => 'required|max:20',
            'content' => 'required|min:10',
            // 'author_id' => 'required|integer|exists:users,id',
            'categories' => 'array',
            'categories.*' => 'integer|distinct|exists:categories,id',
            'imagefile' => 'nullable|file|image'
        ]);
        $validated['author_id'] = $request -> user() -> id;
        $post = Post::create($validated);
        return response($post, 201);
    }

    public function login(Request $request){
        $validated = $request -> validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $validated['email']) -> first();
        if ($user){
            if (password_verify($validated['password'], $user -> password)){
                // tokent adunk :)
                $token = $user -> createToken('tokenname', []);
                return response(["token" => $token -> plainTextToken], 201);
            } else return response(["errors" => ["Login failed."]], 403);
        } else return response(["errors" => ["Login failed."]], 403);
    }
}
