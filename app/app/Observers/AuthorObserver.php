<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthorObserver
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        if ($model->timestamps && Auth::user()) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function updating(Model $model)
    {
        if ($model->timestamps && Auth::user()) {
            $model->updated_by = Auth::user()->id;
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function saving(Model $model)
    {
        if ($model->timestamps && Auth::user()) {
            $model->updated_by = Auth::user()->id;
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function deleting(Model $model)
    {
        if ($model->timestamps && Auth::user() && array_key_exists('deleted_by', $model->getAttributes())) {
            $model->timestamps = false;
            $model->deleted_by = Auth::user()->id;
            $model->save();
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function restoring(Model $model)
    {
//        $model->restored_by = Auth::user()->id;
    }
}
