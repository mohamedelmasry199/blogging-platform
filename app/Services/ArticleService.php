<?php
namespace App\Services;

use App\DTOs\ArticleDto;
use App\Http\Requests\V1\Articles\ArticleRequest;
use App\Http\Resources\UserResource;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;


class ArticleService {

protected $articleRepository;

public function __construct(ArticleRepository $articleRepository)
{
    $this->articleRepository = $articleRepository;
}

public function getAuthorArticles(int $authorId)
{
    return $this->articleRepository->getByAuthor($authorId);
}
public function store(ArticleRequest $request){
    $articleDto = ArticleDto::fromApiRequest($request);
    $articleData = [
        'title' => $articleDto->title,
        'content' => $articleDto->content,
        'is_active' => $articleDto->is_active,
        'is_featured' => $articleDto->is_featured,
        'view_count' => $articleDto->view_count,
        'user_id' => $request->user()->id,
    ];
    $article = $this->articleRepository->create($articleData);
    return $article;
}

public function updateToogle(Article $article, string $field, $status)
{
    if (Request::user()->id!== $article->user_id) {
        return response()->json(['error' => 'Unauthorized to toggle . Only the author can do this.'], 403);
    }
    $isActive = $status === 'activate' ? true : false;
    return $this->articleRepository->updateStatus($article, $field, $isActive);
}


}
