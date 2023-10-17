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
            'id'=>$this->id,
            'username'=>$this->username,
            'email'=>$this->email,
            'firstName'=>$this->firstName,
            'lastName'=>$this->lastName,
            'image'=>$this->image,
            'posts'=>$this->whenLoaded('post', function(){
                return collect($this->post)->each(function($post){
                    return $post;
                });
            })
        ];
    }
}
