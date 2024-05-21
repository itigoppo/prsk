<?php

namespace App\Models;

use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Dialogue
 *
 * @property int $id
 * @property string $uuid
 * @property int|null $from_member_id
 * @property string|null $from_line
 * @property int|null $to_member_id
 * @property string|null $to_line
 * @property string|null $file
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Member|null $fromMember
 * @property-read \App\Models\Member|null $toMember
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereFromLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereFromMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereToLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereToMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Dialogue withoutTrashed()
 * @property-read string $name
 * @mixin \Eloquent
 */
class Dialogue extends Model
{
  use HasFactory, UuidObservable, SoftDeletes;


  const FILE_PATH = 'dialogues';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'uuid',
    'from_member_id',
    'from_line',
    'to_member_id',
    'to_line',
    'file',
    'note',
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

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Member
   */
  public function fromMember()
  {
    return $this->belongsTo(Member::class, 'from_member_id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Member
   */
  public function toMember()
  {
    return $this->belongsTo(Member::class, 'to_member_id');
  }

  protected function name(): Attribute
  {
    return Attribute::make(
      get: fn (): string => (!empty($this->fromMember)
        ? $this->fromMember->name . '(' . $this->fromMember->unit->short . ')'
        : 'everyone') .
        ' + ' .
        (!empty($this->toMember)
          ? $this->toMember->name . '(' . $this->toMember->unit->short . ')'
          : 'everyone'),
    );
  }
}
