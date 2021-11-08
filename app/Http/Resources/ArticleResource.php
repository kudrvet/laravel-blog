<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'text'        => $this->text,
            'slug'        => $this->slug,
            'cover'       => $this->cover,
            'likes_count' => $this->cashed_likes_count,
            'views_count' => $this->cashed_views_count,
            'tags'        => TagResource::collection($this->whenLoaded('tags')),
            'comments'    => CommentResource::collection($this->whenLoaded('comments'))
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function with($request)
    {
        return [
            'success' => 'true'
        ];
    }
}
