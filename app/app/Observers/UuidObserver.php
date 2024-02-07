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
    if (blank($model->uuid)) {
      $model->uuid = Uuid::uuid4()->toString();
    }
  }

  /**
   * @param \Illuminate\Database\Eloquent\Model $model
   * @return void
   */
  public function saving(Model $model)
  {
    if (blank($model->uuid)) {
      $model->uuid = Uuid::uuid4()->toString();
    }
  }
}
