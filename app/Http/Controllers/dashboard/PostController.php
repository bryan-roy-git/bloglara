<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\Models\Category;
use App\Models\PostImage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol.admin');
         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        // dd($posts);
        return view('dashboard.post.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories =  Category::pluck('id', 'title');
        return view("dashboard.post.create", ['post' => new Post(), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        //
        // echo "Hola store";
        // dd($request->all());
        $request->validated();

        $post = Post::create($request->all());
        // dd($post);
        return back()->with('status','Post creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) // el identificardor en realidad va ser un post
    {
        
        return view("dashboard.post.show",["post" => $post]);
    // OTHER METHODS

        // $post = Post::findOrFail($id); // findOrFail:  encuentra el registro en caso de que exista
        // dd($post);
        

        // if ( isset($post)) { // isset: si es distinto a nulo
        //     return view("dashboard.post.show",["post" => $post]);
        // } 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories =  Category::pluck('id', 'title');
        // dd($categories);
        return view("dashboard.post.edit",['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->update($request->validated());
        return back()->with('status','Post actualizado con exito');
    }

    

    public function image (Request $request, Post $post) 
    {   
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240' //10Mb
        ]);

        $filemane = time() . "." . $request->image->extension();

        $request->image->move(public_path('images'), $filemane);

        PostImage::create(['image' => $filemane, 'post_id' => $post->id]);
        return back()->with('status','Imagen cargada con exito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return back()->with('status','Post eliminado con exito');
        // echo "borrar";
    }
}
