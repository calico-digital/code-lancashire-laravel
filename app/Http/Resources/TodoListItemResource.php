<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoListItemResource extends JsonResource
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
            'item' => $this->item,
            'completed' => $this->completed ? 'Yes' : 'No',
            'created_at' => $this->created_at->format('d/m/Y H:i'),
            'resource_url' => route('todo.show', ['todo' => $this]),
        ];
    }
}
