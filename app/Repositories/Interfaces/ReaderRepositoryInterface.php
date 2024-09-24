<?php


namespace App\Repositories\Interfaces;

use App\Models\Article;

interface ReaderRepositoryInterface
{
    public function getFeaturedArticles();
    public function getArticle(Article $article);
    public function react(Article $article,bool $isLike);
}
