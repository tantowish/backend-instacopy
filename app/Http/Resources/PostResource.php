<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'new_content'=>$this->news_content,
            'created_at'=>$formattedDate,
        ];
    }
}
