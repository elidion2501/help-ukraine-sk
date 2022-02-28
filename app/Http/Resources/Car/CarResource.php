<?php

namespace App\Http\Resources\Car;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'name'  => $this->name,
            'phone'  => $this->phone,
            'city_from'  => $this->cityFrom?->name,
            'city_to'  => $this->cityTo?->name,
            'info'  => $this->info,
            'car'  => $this->car,
            'count'  => $this->count,
            'type'  => $this->type,
            'with_animals'  => $this->with_animals,
            'only_stuff'  => $this->only_stuff,
            'with_people'  => $this->with_people,
            'created_at'  => $this->created_at,
            'take_from_borders' => $this->take_from_borders,
        ];
    }
}
