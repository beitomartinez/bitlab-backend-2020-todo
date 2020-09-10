<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'level' => $this->level,
            'level_human' => $this->human_level,
            'state' => $this->state,
            'state_human' => $this->human_state,
            'category' => new CategoryResource($this->whenLoaded('category'))
        ];
    }
}
