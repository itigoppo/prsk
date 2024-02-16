<?php

namespace App\Models;

use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
  use HasFactory, UuidObservable, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'uuid',
    'unit_id',
    'icon_id',
    'code',
    'name',
    'short',
    'bg_color',
    'color',
    'is_active',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'id',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'is_active' => 'boolean',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Unit
   */
  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Icon
   */
  public function icon()
  {
    return $this->belongsTo(Icon::class);
  }
}
