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
 * @property string $path
 * @property string $name
 * @property string $mime_type
 * @property string $extension
 * @property string $label
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property int $updated_by
 */
class Icon extends Model
{
    use HasFactory;
    use AuthorObservable;
    use UuidObservable;

    const FILE_PATH = 'prsk/icons';

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
