<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\User\CategoryRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

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
            return CategoryCollection::collection($this->category->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;

        $category->save();

        return response(['data' => new CategoryResource($category)], response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $this->category->find($id);
        $category->name = $request->name;

        $category->save();

        return response(['data' => new CategoryResource($category)], response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);

        $category->delete();

        return response(null, response::HTTP_NO_CONTENT);
    }
}
