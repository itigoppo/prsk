<?php

namespace App\Models;

use App\Enums\TuneType;
use App\Traits\AuthorObservable;
use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property Carbon $released_at
 * @property string $name
 * @property string $type
 * @property int $unit_id
 * @property bool $has_3d_mv
 * @property bool $has_2d_mv
 * @property bool $has_original_mv
 * @property int $easy_level
 * @property int $normal_level
 * @property int $hard_level
 * @property int $expert_level
 * @property int $master_level
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property Carbon $deleted_at
 * @property int $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Relations\BelongsTo|Unit $unit
 * @property-read \Illuminate\Database\Eloquent\Relations\HasMany|Singer[] $singers
 * @property-read array $singers_by_type
 * @property-read \Illuminate\Database\Eloquent\Relations\HasMany|Dancer[] $dancers
 */
class Tune extends Model
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
        'released_at' => 'datetime',
        'type' => TuneType::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Unit
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Singer[]
     */
    public function singers()
    {
        return $this->hasMany(Singer::class);
    }

    /**
     * @return array
     */
    public function getSingersByTypeAttribute(): array
    {
        $result = [];
        foreach ($this->singers as $singer) {
            $result[$singer->type . '-' . $singer->vocal_key][] = $singer;
        }

        return $result;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Dancer[]
     */
    public function dancers()
    {
        return $this->hasMany(Dancer::class);
    }
}
