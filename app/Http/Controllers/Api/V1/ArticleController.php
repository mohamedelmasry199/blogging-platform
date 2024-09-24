<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Articles\ArticleRequest;
use App\Http\Requests\V1\Articles\StatusRequest;
use App\Http\Resources\ArticlesAuthorResource;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $articles = $this->articleService->getAuthorArticles($request->user()->id);
        return ArticlesAuthorResource::collection($articles);
    }
    public function store(ArticleRequest $request){
        $article = $this->articleService->store($request);
        return response()->json($article, 201);
    }
    public function toggleActivation(StatusRequest $request, Article $article)
    {
        $status = $request->status;
        $result = $this->articleService->updateToogle($article,'is_active', $status);
        return response()->json($result);

    }
    public function toggleFeature(StatusRequest $request, Article $article)
    {
        $status = $request->status;
        $result = $this->articleService->updateToogle($article,'is_featured', $status);
        return response()->json($result);

    }
}
