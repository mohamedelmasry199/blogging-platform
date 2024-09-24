<?php
namespace App\Services;

use App\DTOs\ArticleDto;
use App\Http\Requests\V1\Articles\ArticleRequest;
use App\Http\Resources\UserResource;
use App\Models\Article;
use App\Repositories\ReaderRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;


class ReaderService {

protected $readerRepository;

public function __construct(ReaderRepository $readerRepository)
{
    $this->readerRepository = $readerRepository;
}

public function getFeaturedArticles()
{
    return $this->readerRepository->getFeaturedArticles();
}
public function ShowArticle(Article $article)
{
    $article= $this->readerRepository->getArticle($article);
    if (!$article) {
        return null;
    }
    $article->view_count++;
    $article->save();
    return $article;
}

public function react(Article $article,$is_like)
{
    return $this->readerRepository->react($article, $is_like);
}


}
