<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleReaderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'view_count' => $this->view_count,
            'created_at' => $this->created_at->toDateTimeString(),
            'author'=>[
                'id' => $this->author->id,
                'name' => $this->author->name,
                'email' => $this->author->email,
            ]
        ];
        }
}
