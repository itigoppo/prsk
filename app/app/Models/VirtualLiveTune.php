<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property int $virtual_live_id
 * @property int $tune_id
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property-read \Illuminate\Database\Eloquent\Relations\BelongsTo|VirtualLive $virtual_live
 * @property-read \Illuminate\Database\Eloquent\Relations\BelongsTo|Tune $tune
 */
class VirtualLiveTune extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|VirtualLive
     */
    public function virtualLive()
    {
        return $this->belongsTo(VirtualLive::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Tune
     */
    public function tune()
    {
        return $this->belongsTo(Tune::class);
    }
}
