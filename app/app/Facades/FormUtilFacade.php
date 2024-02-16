<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FormUtilFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'form';
  }
}
