<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\FrontEnd\FrontendRepositoryInterface;
use App\Repositories\User\PostRepositoryInterface;
use App\Repositories\User\SettingRepositoryInterface;

class FrontendController extends Controller
{
    private $post;
    private $settings;

    public function __construct(
        PostRepositoryInterface $postRepository,
        SettingRepositoryInterface $settingRepository
    )
    {
        $this->post = $postRepository;
        $this->setting = $settingRepository;
    }

    public function fetchAllPosts()
    {
        $posts = $this->post->latest();
        return response()->json($posts, 200);
    }

    public function fetchSinglePost(Request $request)
    {
        $post = $this->post->find($request->id);

        return response()->json($post, 200);
    }
}
