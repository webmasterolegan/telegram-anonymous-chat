<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'direction' => $this->direction->name,
            'text' => $this->text,
            'contact' => new ContactResource($this->contact),
            'user' => $this->when($this->user_id, fn (): UserResource => new UserResource($this->user)),
            'created_at' => $this->created_at,
        ];
    }
}
