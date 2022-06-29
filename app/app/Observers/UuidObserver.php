<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class UuidObserver
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        $model->uuid = Uuid::uuid4()->toString();
    }
}
