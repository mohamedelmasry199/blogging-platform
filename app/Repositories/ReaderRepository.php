<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Like;
use App\Repositories\Interfaces\ReaderRepositoryInterface;

class ReaderRepository implements ReaderRepositoryInterface{
    public function getFeaturedArticles(){
        $articles=Article::featured()->active()->with('author')->paginate();
        return $articles;
    }
    public function getArticle(Article $article){
        $article= Article::with('author')
        ->featured()
        ->active()
        ->where('id', $article->id)
        ->first();

        return $article;
    }
    public function react(Article $article, bool $isLike)
    {
        $reaction = $article->likes()->firstOrNew(['user_id' => auth()->id()]);

        if ($reaction->exists && $reaction->like === $isLike) {
            $reaction->delete();
            return ['status' => 'deleted', 'message' => 'React deleted successfully'];
        }
        $reaction->like = $isLike;
        $reaction->save();

        return [
            'status' => $reaction->wasRecentlyCreated ? 'added' : 'updated',
            'message' => $reaction->wasRecentlyCreated ? 'React added successfully' : 'React updated successfully'
        ];
    }

}
