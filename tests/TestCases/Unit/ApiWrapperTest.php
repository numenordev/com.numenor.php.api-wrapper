<?php

namespace Tests\TestCases\Unit;

use Numenor\ApiWrapper\Api\Endpoint;
use Numenor\ApiWrapper\Api\Route;
use Numenor\ApiWrapper\ApiWrapper;
use PHPUnit\Framework\TestCase;

class ApiWrapperTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testLoad()
    {
        ApiWrapper::load(__DIR__ . '/../../Assets/routes/test.php');

        $route = Route::find('file.test');
        $this->assertInstanceOf(Endpoint::class, $route);
    }
}