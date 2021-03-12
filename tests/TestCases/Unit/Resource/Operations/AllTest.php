<?php

namespace Tests\TestCases\Unit\Resource\Operations;

use Numenor\ApiWrapper\Api\Route;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use Tests\Assets\Resource\Resources\BasicApiResource;
use Tests\Helpers\MocksGuzzle;

class AllTest extends TestCase
{
    use MocksGuzzle;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        Route::get('basicApiResources.all', '/basicApiResources');
    }

    /**
     * Expected Behavior:
     * - Array of ApiResource instances with correct attributes returned
     */
    public function testAll()
    {
        $data = [
            [
                'id' => 1
            ],
            [
                'id' => 2
            ]
        ];
        $json = json_encode($data);
        $response = BasicApiResource::all([], $this->getMockClient(200, $json));

        $this->assertInstanceOf(Collection::class, $response);
        foreach($response as $datum) {
            $this->assertInstanceOf(BasicApiResource::class, $datum);
        }

        $this->assertCount(2, $response);
        $this->assertEquals($data[0], $response[0]->attributes);
        $this->assertEquals($data[1], $response[1]->attributes);
    }
}