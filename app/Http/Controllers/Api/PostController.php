<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\PostService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class PostController extends Controller
{
    public function __construct(private readonly PostService $postService)
    {
        $this->authorizeResource(Post::class, 'post', [
            'except' => ['create', 'store'],
        ]);

        $this->middleware('can:create,App\Models\Post,blog')
            ->only(['create', 'store']);

        $this->middleware('cache.headers:public;max_age=2628000;etag');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Blog $blog): PostCollection
    {
        $posts = $blog->posts()
           ->latest()
           //->get();
           ->paginate(5);

        //return $posts;
        return new PostCollection($posts);
    }

    /**
     * 글 쓰기
     */
    public function store(StorePostRequest $request, Blog $blog): SymfonyResponse
    {
        $post = $this->postService->store($request->validated(), $blog);

        return (new PostResource($post))
                ->response()
                ->setStatusCode(201);
    }
    /**
     * 글 읽기
     */
    public function show(Request $request, Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * 글 수정
     */
    public function update(UpdatePostRequest $request, Post $post): Response
    {
        $this->postService->update($request->validated(), $post);

        return response()->noContent();
    }

    /**
     * 글 삭제
     */
    public function destroy(Post $post): Response
    {
        $this->postService->destroy($post);

        return response()->noContent();
    }
}
