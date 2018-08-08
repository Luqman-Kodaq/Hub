<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Repositories\User\TagRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Tag\TagResource;
use App\Http\Resources\Tag\TagCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{

    private $tag;

    public function __construct(
        TagRepositoryInterface $tagRepository
    )
    {
        $this->tag = $tagRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TagCollection::collection($this->tag->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
          $tag = new Tag();
          $tag->name = $request->name;

          $tag->save();

          return response(['data' => new TagResource($tag)], response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
          $tag = $this->tag->find($id);
          $tag->name = $request->name;

          $tag->save();

          return response(['data' => new TagResource($tag)], response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = $this->tag->find($id);

        $tag->delete();

       return response(null, response::HTTP_NO_CONTENT);
    }
}
