<?php

namespace App\Http\Resources;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'subject'    => $this->subject,
            'body'       => $this->body,
            'updated_at' => $this->updated_at
        ];
    }
}
