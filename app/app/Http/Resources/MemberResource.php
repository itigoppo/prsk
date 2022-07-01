<?php

namespace App\Http\Resources;

use App\Models\Icon;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'id' => $this->uuid,
            'name' => $this->name,
            'short' => $this->short,
            'bg_color' => $this->bg_color,
            'color' => $this->color,
            'icon' => !empty($this->icon->uuid) ? $this->icon->uuid : '',
            'icon_url' => !empty($this->icon->uuid) ? Icon::url(route('medias.icons', ['icon_id' => $this->icon->uuid]), 600) : null,
            'unit' => [
                'id' => $this->unit->uuid,
                'name' => $this->unit->name,
                'short' => $this->unit->short,
                'bg_color' => $this->unit->bg_color,
                'color' => $this->unit->color,
            ],
        ];
    }
}
