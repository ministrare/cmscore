<?php

namespace Ministrare\Cmscore\Facades;

use Illuminate\Support\Facades\Facade;

class Input extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'input';
    }
}
