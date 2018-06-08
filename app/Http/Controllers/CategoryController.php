<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\User\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    private $category;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    )
    {
            $this->category = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             return view('user.categories.index')
                     ->with('categories', $this->category->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $this->category->store($request);

        $redirect_to = $request->has('redirect') ? redirect()->route('category.index') : back();

        return $redirect_to
                ->with('success', 'New category added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $category = $this->category->find($request->id);

        return view('user.categories.edit')
                ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request)
    {
        $this->category->update($request->id, $request);

        $redirect_to = $request->has('redirect') ? redirect()->route('category.index') : back();

        return $redirect_to
            ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = $this->category->find($request->id);

        $category->delete();

        return back()
        ->with('success', 'Tag deleted successfully');
    }
}
