<?php

namespace Tests\Assets\Api\Processors;

use Numenor\ApiWrapper\Api\Processor;
use Numenor\ApiWrapper\Api\Request;
use Numenor\ApiWrapper\Api\Response;

class BasicPreProcessor extends Processor
{
    public static $called = false;

    public static function handle(Request $request, callable $next): Response
    {
        static::$called = true;

        return $next($request);
    }
}