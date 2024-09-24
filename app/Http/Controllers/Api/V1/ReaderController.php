<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Articles\LikeRequest;
use App\Http\Resources\ArticleReaderResource;
use App\Models\Article;
use App\Services\ReaderService;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ReaderController extends Controller
{
    protected $readerService;
    public function __construct(ReaderService $readerService){
        $this->readerService = $readerService;
    }
    public function articles(){
        $articles = $this->readerService->getFeaturedArticles();
        return ArticleReaderResource::collection($articles);
    }
    public function showArticle (Article $article){
        $article = $this->readerService->ShowArticle($article);
        if (!$article) {
            return response()->json(['message' => 'Not allowed'], 403);
        }
        return response()->json(new ArticleReaderResource($article) );
    }
    public function reactArticle(LikeRequest $request, Article $article)
    {
        $isLike = $request->is_like;
        $reaction = $this->readerService->react($article, $isLike);
        return response()->json([
            'status' => $reaction['status'],
            'message' => $reaction['message']
        ]);
    }

}
