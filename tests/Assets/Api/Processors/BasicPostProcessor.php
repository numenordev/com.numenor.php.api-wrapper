<?php

namespace Tests\Assets\Api\Processors;

use Numenor\ApiWrapper\Api\Processor;
use Numenor\ApiWrapper\Api\Request;
use Numenor\ApiWrapper\Api\Response;

class BasicPostProcessor extends Processor
{
    public static $called = false;

    public static function handle(Request $request, callable $next): Response
    {
        $response = $next($request);

        static::$called = true;

        return $response;
    }
}