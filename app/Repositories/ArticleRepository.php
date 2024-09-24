<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface{
    public function getByAuthor(int $authorId){
        $articles=Article::where('user_id',$authorId)->paginate();
        return $articles;
    }
    public function create(array $data){
        $article = new Article();
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->is_active = $data['is_active'];
        $article->is_featured = $data['is_featured'];
        $article->view_count = $data['view_count'];
        $article->user_id = $data['user_id'];
        $article->save();
        return $article;
    }
    public function updateStatus($article, string $attribute, bool $status)
    {
        $article->$attribute = $status;
        $article->save();
        return $article;
    }
 
}
