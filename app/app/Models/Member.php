<?php

namespace App\Models;

use App\Enums\Attribute;
use App\Enums\Rarity;
use App\Enums\SkillEffect;
use App\Traits\AuthorObservable;
use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
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

    /**
     * @param \App\Models\Card[]|\App\Repositories\CardsRepository[]|\Illuminate\Database\Eloquent\Collection $cards
     * @return \App\Models\Card[]|\App\Repositories\CardsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    private function setCardsReport($cards)
    {
        foreach ($cards as $key => $card) {
            $index = intval($key);
            if ($index === 0) {
                $diff = null;
            } else {
                $before = $cards[$index - 1];
                $diff = $before->released_at->diffInDays($card->released_at);
            }
            $card->setAttribute("diff", $diff);
        }

        return $cards;
    }

    public function getHasCardsWithOneStarRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_ONE,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithTwoStarRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_TWO,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithThreeStarRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_THREE,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithFourStarRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithBirthdayRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::BIRTHDAY,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithRegularForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'nltd' => 1,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithLimitedForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ltd' => 1,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithRegularLimitedForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ltd' => 1,
            'nfes' => 1,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithFesForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ltd' => 1,
            'fes' => 1,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithHairStyleAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ltd' => 1,
            'hhs' => 1,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithAnotherCutAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ltd' => 1,
            'hac' => 1,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithAvatarAccessoryAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ltd' => 1,
            'haa' => 1,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithSpecialScoreSkillForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ske' => SkillEffect::SPECIAL_SCORE,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithUnitScoreBoostSkillForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ske' => SkillEffect::UNIT_SCORE_BOOST,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithDependOfAccuracySkillForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ske' => SkillEffect::DEPENDS_ON_ACCURACY,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithDependOfLifeSkillForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ske' => SkillEffect::DEPENDS_ON_LIFE,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithScoreBoostSkillForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ske' => SkillEffect::SCORE_BOOST,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithLifeRecoverSkillForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ske' => SkillEffect::LIFE_RECOVER,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithJudgmentSkillForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'ske' => SkillEffect::JUDGMENT,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithAttributeCuteForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'at' => Attribute::CUTE,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithAttributeCoolForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'at' => Attribute::COOL,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithAttributePureForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'at' => Attribute::PURE,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithAttributeHappyForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'at' => Attribute::HAPPY,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }

    public function getHasCardsWithAttributeMysteriousForStarFourRarityAttribute()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $request = [
            'mids' => [$this->id],
            'ray' => Rarity::STAR_FOUR,
            'at' => Attribute::MYSTERIOUS,
        ];
        $order = [
            'released_at' => 'asc',
        ];

        return $this->setCardsReport($cardsService->findAll($request, $order));
    }
}
