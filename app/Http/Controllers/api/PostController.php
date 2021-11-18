<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::orderBy('created_at','desc')->with('category')->with('image')->paginate(10);
        return $this->successResponse($post);
        // return response()->json(['tile' => 'Hola mundo laravel']);
        // echo "Hola mundo laravel";
    }

    public function show(Post $post)
    {
        //
        $post->image;
        $post->category;
        return $this->successResponse($post);
    }

    public function url_clean (String $url_clean)
    {
        //

        $post = Post::where('url_clean', $url_clean)->first();
        $post->image;
        $post->category;
        return $this->successResponse($post);
    }

    public function category (Category $category)
    {
        // dd($category->post()->paginate(10));// "()" devulve una instacia del objeto relacionado para poder user query builder
        return $this->successResponse(['posts' => $category->post()->paginate(10), 'category' => $category]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
