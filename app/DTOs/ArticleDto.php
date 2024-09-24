<?php

namespace App\DTOs;

use App\Http\Requests\V1\Articles\ArticleRequest;

class ArticleDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly bool $is_active,
        public readonly bool $is_featured,
        public readonly int $view_count = 0
    ) {}

    public static function fromApiRequest(ArticleRequest $request): self
    {
        return new self(
            $request->title,
            $request->content,
            $request->is_active ?? true,
            $request->is_featured ?? false,

        );
    }
}
