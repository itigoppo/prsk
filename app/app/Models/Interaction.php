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
 * @property int $from_member_id
 * @property string $from_line
 * @property int $to_member_id
 * @property string $to_line
 * @property string $file
 * @property string $note
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property Carbon $deleted_at
 * @property int $deleted_by
 * @property-read Member $fromMember
 * @property-read Member $toMember
 */
class Interaction extends Model
{
    use HasFactory;
    use AuthorObservable;
    use SoftDeletes;
    use UuidObservable;

    const FILE_PATH = 'interactions';

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

}
