<?php


namespace App\Repositories\Interfaces;

interface ArticleRepositoryInterface
{
    public function getByAuthor(int $authorId);
    public function create(array $data);
    public function updateStatus($article,string $attribute , bool $status);
    // public function updateFeaturedStatus(int $articleId, bool $status);
   

}
