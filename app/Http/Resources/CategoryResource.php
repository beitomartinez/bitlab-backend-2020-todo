<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'color' => $this->color,
            'created_at' => $this->created_at->format('Y-m-d'),
            'tasks' => TaskResource::collection($this->whenLoaded('tasks'))
        ];
    }
}
