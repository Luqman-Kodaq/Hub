<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\User\PostRepositoryInterface;
use App\Repositories\User\CategoryRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\User\TagRepositoryInterface;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostCollection;
use Illuminate\Http\Request;
use App\Post;
use Image;
use Auth;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    private $post;
    private $category;
    private $tag;

    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface  $categoryRepository,
        TagRepositoryInterface  $tagRepository
    )
    {
        $this->post = $postRepository;
        $this->category = $categoryRepository;
        $this->tag = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostCollection::collection($this->post->all());
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        // $request['user_id'] = $request->author;
        //    unset($request['author']);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->excerpt = $request->excerpt;
        $post->contents = $request->contents;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->id();

      $post->tags()->sync($request->tags, false);

      $post->save();
      return response(['data' => new PostResource($post)], Response::HTTP_CREATED);

        // $user = Auth::user();

        // $post = $user->posts()->create([
        //     'title' => $request->title,
        //     'slug' => str_slug($request->title),
        //     'excerpt' => $request->excerpt,
        //     'contents' => $request->contents,
        //     'category_id' => $request->category_id,
        // ]);

        // return response(['data' => new PostResource($post)], Response::HTTP_CREATED);
    }

    public function uploadImage(Request $request)
    {
            // Save the Image
            if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = "uploads/post_photo/$filename";
            Image::make($image)->resize(800, 400)->save($location);

            return response()->json(asset("$location"), Response::HTTP_CREATED);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $post = $this->post->find($id);

            return new PostResource($post);
    }

    /**
     * Show Draft posts
     * 
     * @return \illuminate\Http\Response
     */
    public function drafts(){}

    /*    
     *  Published Posts 
     */
        public function publish(Request $request)
        {
            $post = $this->post->published($request->id);
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
        $request['user_id'] = $request->author;
           unset($request['author']);

           $post = Post::find($id);
            $post->title = $request->title;
            $post->excerpt = $request->excerpt;
            $post->contents = $request->contents;
            $post->category_id = $request->category_id;
            $post->user_id = $request->user_id;

            if ($request->hasFile('image')) {
             $image = $request->file('image');
             $filename = time(). '.' . $image->getClientOriginalExtension();
             $location = public_path('uploads/post_photo/' . $filename);
             Image::make($image)->resize(800, 400)->save($location);
     
           $post->image = asset("uploads/post_photo/$filename");              
           }          

           if (isset($request->tags)) {
             $post->tags()->sync($request->tags);
         } else {
             $post->tags()->sync(array());
         }

        $post->save();
       return response(['data' => new PostResource($post)], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from table.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function temporaryDelete($id)
    {
        $post = $this->post->find($id);

        $post->delete();

        return response(null, response::HTTP_NO_CONTENT);
    }

     /**
     * Retrieve the specified resource from storage.
     * 
     * @param int $request
     * @return \Illuminate\Http\Response 
     */
    public function onlyTrashed(Request $request){}

    /**
     * Remove the specified resource completely from storage.
     * 
     * @param int $request
     * @return \Illuminate\Http\Response 
     */
    public function destroy($id)
    {
        $post = $this->post->forceDelete($id);

        $post->forceDelete();

        return response(null, response::HTTP_NO_CONTENT);
    }

     /**
     * Remove the specified resource completely from storage.
     * 
     * @param int $request
     * @return \Illuminate\Http\Response 
     */
    public function restore(Request $request)
    {
        $post = $this->post->restore($request->id);

        $post->restore();

        return new PostResource($post);
    }

    public function apiCheckUnique(Request $request)
    {
        return json_encode(!$this->post->where('slug', '=', $request->slug)->exists());
    }
}