<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $formattedDate =  Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
        return [
            'id'=> $this->id,
            'comments_content'=> $this->comments_content,
            'user_id'=>$this->whenLoaded('user'),
            'created_at'=>$formattedDate
        ];
    }
}
