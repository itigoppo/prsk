<?php

namespace App\Models;

use App\Enums\Attribute;
use App\Enums\EventType;
use App\Traits\AuthorObservable;
use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property Carbon $starts_at
 * @property Carbon $ends_at
 * @property string $name
 * @property \App\Enums\EventType $type
 * @property \App\Enums\Attribute $attribute
 * @property int $tune_id
 * @property bool $is_key_story
 * @property int $story_chapter
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property Carbon $deleted_at
 * @property int $deleted_by
 * @property-read int $unit_count
 * @property-read \Illuminate\Database\Eloquent\Relations\BelongsTo|Tune $tune
 * @property-read \Illuminate\Database\Eloquent\Relations\HasMany|EventCard[] $eventCards
 * @property-read \Illuminate\Database\Eloquent\Relations\HasMany|EventMember[] $eventMembers
 * @property-read \Illuminate\Database\Eloquent\Relations\hasOne|EventCard $bannerCard
 * @property-read \App\Models\Card[] $bonus_cards
 */
class Event extends Model
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
        'type' => EventType::class,
        'attribute' => Attribute::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Tune
     */
    public function tune()
    {
        return $this->belongsTo(Tune::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|EventCard[]
     */
    public function eventCards()
    {
        return $this->hasMany(EventCard::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|EventMember[]
     */
    public function eventMembers()
    {
        return $this->hasMany(EventMember::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne|EventCard
     */
    public function bannerCard()
    {
        return $this->hasOne(EventCard::class)->where('is_banner', '=', true);
    }

    /**
     * @return \App\Models\Card[]|\App\Repositories\CardsRepository[]|\Illuminate\Database\Eloquent\Collection|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getBonusCardsAttribute()
    {
        $memberIds = Arr::pluck($this->eventMembers, 'member_id');

        if (empty($memberIds)) {
            return null;
        }

        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => $memberIds,
            'ratb' => $this->starts_at,
            'at' => $this->attribute,
        ];
        $order = [
            'rarity' => 'asc',
            'member_id' => 'asc',
        ];

        return $cardsService->findAll($request, $order);
    }
}
