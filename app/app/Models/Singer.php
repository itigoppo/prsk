<?php

namespace App\Models;

use App\Enums\VocalType;
use App\Traits\AuthorObservable;
use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property string $type
 * @property string $vocal_key
 * @property int $tune_id
 * @property int $member_id
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read Tune $tune
 * @property-read Member $member
 */
class Singer extends Model
{
    use HasFactory;
    use AuthorObservable;
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
        'type' => VocalType::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Tune
     */
    public function tune()
    {
        return $this->belongsTo(Tune::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Member
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
