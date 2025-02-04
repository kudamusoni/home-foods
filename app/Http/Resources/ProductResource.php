<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category->name,
            'price' => (float) $this->price / 100,         // Uses getPriceAttribute()
            'sale_price' => (float) $this->sale_price / 100,
            'cost_per_item' => (float) $this->cost_per_item / 100,
            'quantity' => $this->quantity,
        ];
        // return parent::toArray($request);
    }
}
