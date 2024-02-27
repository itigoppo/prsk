<?php

namespace App\Models;

use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Member
 *
 * @property int $id
 * @property string $uuid
 * @property int $unit_id
 * @property int|null $icon_id
 * @property string $code
 * @property string $name
 * @property string $short
 * @property string $color
 * @property string $bg_color
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Icon|null $icon
 * @property-read \App\Models\Unit|null $unit
 * @method static \Database\Factories\MemberFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereIconId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Member withoutTrashed()
 * @mixin \Eloquent
 */
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
