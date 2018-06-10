<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\User\PostRepositoryInterface;
use App\Repositories\User\CategoryRepositoryInterface;
use App\Repositories\User\TagRepositoryInterface;
use Illuminate\Http\Request;
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
        return view('user.posts.index')
        ->with('posts', $this->post->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.posts.create')
            ->with('categories', $this->category->all())
            ->with('tags', $this->tag->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $this->post->store($request);

        $redirect_to = $request->has('redirect') ? redirect()->route('post.index') : back();

        return $redirect_to
                ->with('success', 'New post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $post = $this->post->published()->findOrFail($id);

            return view('user.posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.posts.draftEdit')
                ->with('post', $this->post);
    }

    /**
     * Show Draft posts
     * 
     * @return \illuminate\Http\Response
     */
    public function drafts()
    {
        return view('user.posts.draftIndex')
                ->with('posts', $this->post);
    }

    /*    
     *  Published Posts 
     */
    public function publish($id)
    {
        $redirect_to = $request->has('redirect') ? redirect()->route('post.index') : back();
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
        $this->post->update($request->id, $request);

        $redirect_to = $request->has('redirect') ? redirect()->route('post_draft.index') : back();

        return $redirect_to
            ->with('success', 'Post updated successfully');
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

    public function apiCheckUnique(Request $request)
    {
        return json_encode(!$this->post->where('slug', '=', $request->slug)->exists());
    }
}
