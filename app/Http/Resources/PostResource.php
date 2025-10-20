<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use  App\Http\Resources;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'post_content'=>$this->content,
            'created_since'=>$this->created_at->diffForHumans(),
            'author'=>new UserResource($this->whenLoaded('user')),
            'comments'=>CommentResource::collection($this->whenLoaded('comment')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
        ];
    }
}
