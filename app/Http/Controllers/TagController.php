<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Repositories\User\TagRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('user.tags.index')
                ->with('tags', $this->tag->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        $this->tag->store($request);

            $redirect_to = $request->has('redirect') ? redirect()->route('tag.index') : back();

            return $redirect_to
                    ->with('success', 'New tag added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $tag = $this->tag->find($request->id);

        return view('user.tags.edit')
                ->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request)
    {
        $this->tag->update($request->id, $request);

        $redirect_to = $request->has('redirect') ? redirect()->route('tag.index') : back();

        return $redirect_to
            ->with('success', 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tag = $this->tag->find($request->id);

        $tag->delete();

        return back()
        ->with('success', 'Tag deleted successfully');
    }
}
