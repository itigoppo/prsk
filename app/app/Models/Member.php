<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $uuid
 * @property int $unit_id
 * @property int $icon_id
 * @property string $code
 * @property string $name
 * @property string $short
 * @property string $bg_color
 * @property string $color
 * @property bool $is_active
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property Carbon $deleted_at
 * @property int $deleted_by
 * @property-read Unit $unit
 * @property-read Icon $icon
 * @property-read string $active_label
 * @property-read string $display_name
 * @property-read string $display_short
 */
class Member extends Model
{
    use HasFactory;
    use AuthorObservable;
    use SoftDeletes;
    use UuidObservable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'short',
        'bg_color',
        'color',
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

    /**
     * @return string
     */
    public function getActiveLabelAttribute(): string
    {
        return $this->is_active ? '有効' : '無効';
    }

    /**
     * @return string
     */
    public function getDisplayNameAttribute(): string
    {
        $result = $this->name;

        if (Str::endsWith($this->code, ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'])) {
            $result .= '(' . $this->unit->short . ')';
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getDisplayShortAttribute(): string
    {
        $result = $this->short;

        if (Str::endsWith($this->code, ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'])) {
            $result .= '(' . $this->unit->short . ')';
        }

        return $result;
    }
}
