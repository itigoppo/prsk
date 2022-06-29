<?php
namespace App\Traits;

use App\Observers\UuidObserver;

trait UuidObservable
{
    public static function bootUuidObservable()
    {
        self::observe(UuidObserver::class);
    }
}
