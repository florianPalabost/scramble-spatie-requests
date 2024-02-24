<?php

namespace Fp\ScrambleSpatieRequests\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fp\ScrambleSpatieRequests\ScrambleSpatieRequests
 */
class ScrambleSpatieRequests extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Fp\ScrambleSpatieRequests\ScrambleSpatieRequests::class;
    }
}
