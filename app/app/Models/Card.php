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
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property Carbon $released_at
 * @property \App\Enums\Rarity $rarity
 * @property \App\Enums\Attribute $attribute
 * @property string $name
 * @property int $member_id
 * @property \App\Enums\SkillEffect $skill_effect
 * @property string $skill_name
 * @property string $costume
 * @property bool $has_hair_style
 * @property bool $has_another_cut
 * @property bool $has_avatar_accessory
 * @property bool $is_limited
 * @property bool $is_fes
 * @property int $performance
 * @property string $normal_file
 * @property string $after_training_file
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property Carbon $deleted_at
 * @property int $deleted_by
 * @property-read Member $member
 * @property-read string $display_name
 */
class Card extends Model
{
    use HasFactory;
    use AuthorObservable;
    use SoftDeletes;
    use UuidObservable;

    const FILE_PATH = 'cards';

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
        'rarity' => Rarity::class,
        'attribute' => Attribute::class,
        'skill_effect' => SkillEffect::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Member
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * @return string
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->rarity->description . ' [' . $this->name . '] ' . $this->member->display_name;
    }

    /**
     * @param string $path
     * @param int $expire
     * @return string
     */
    public static function url(string $path, int $expire = 5): string
    {
        $expiration = now()->addSeconds($expire)->format('U');
        $token = encrypt($expiration);

        return url($path) .
            '?expiration='. $expiration .
            '&token='. $token;

    }
}
