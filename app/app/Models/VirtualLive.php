<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property Carbon $starts_at
 * @property Carbon $ends_at
 * @property string $name
 * @property int $event_id
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property Carbon $deleted_at
 * @property int $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Relations\BelongsTo|Event $event
 * @property-read \Illuminate\Database\Eloquent\Relations\HasMany|VirtualLiveMember[] $virtualLiveMembers
 * @property-read \Illuminate\Database\Eloquent\Relations\HasMany|VirtualLiveTune[] $virtualLiveTunes
 */
class VirtualLive extends Model
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
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Event
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|VirtualLiveMember[]
     */
    public function virtualLiveMembers()
    {
        return $this->hasMany(VirtualLiveMember::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|VirtualLiveTune[]
     */
    public function virtualLiveTunes()
    {
        return $this->hasMany(VirtualLiveTune::class);
    }
}
