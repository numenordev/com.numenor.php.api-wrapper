<?php

namespace Numenor\ApiWrapper\Api;

abstract class Processor
{
    public abstract static function handle(Request $request, callable $next): Response;
}