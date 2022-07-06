<?php

namespace App\Models;

use App\Enums\ChangeLogType;
use App\Traits\AuthorObservable;
use App\Traits\UuidObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property string $type
 * @property string $note
 * @property Carbon $released_at
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 * @property Carbon $deleted_at
 * @property int $deleted_by
 * @property
 */
class ChangeLog extends Model
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
        'type' => ChangeLogType::class,
    ];
}
