<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->uuid,
      'name' => $this->name,
      'short' => $this->short,
      'bgColor' => $this->bg_color,
      'color' => $this->color,
      'icon' => empty($this->icon) ? null : route('media.icons', ['id' => $this->icon->uuid, 'token' => \StorageUtil::createToken(600)]),
      'unit' => [
        'id' => $this->unit->uuid,
        'name' => $this->unit->name,
        'short' => $this->unit->short,
        'bgColor' => $this->unit->bg_color,
        'color' => $this->unit->color,
      ],
    ];
    // return parent::toArray($request);
  }
}
