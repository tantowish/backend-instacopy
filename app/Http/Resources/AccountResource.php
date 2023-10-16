<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'username'=>$this->id,
            'email'=>$this->email,
            'firstName'=>$this->firstName,
            'lastName'=>$this->lastName,
            'posts'=>$this->whenLoaded('post', function(){
                return collect($this->post)->each(function($post){
                    return $post;
                });
            })
        ];
    }
}
