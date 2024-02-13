<?php

namespace App\Models;

use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Icon
 *
 * @property int $id
 * @property string $uuid
 * @property string $path
 * @property string $name
 * @property string|null $mime_type
 * @property string|null $extension
 * @property string|null $label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Icon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icon onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Icon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Icon withoutTrashed()
 * @mixin \Eloquent
 */
class Icon extends Model
{
  use HasFactory, UuidObservable;

  const FILE_PATH = 'icons';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'uuid',
    'path',
    'name',
    'mime_type',
    'extension',
    'label',
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
  protected $casts = [];

  public static function filePath(Icon $entity): string
  {
    return $entity->path . '/' . $entity->name;
  }
}
