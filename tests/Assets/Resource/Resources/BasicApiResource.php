<?php

namespace Tests\Assets\Resource\Resources;

use Numenor\ApiWrapper\Resource\Contracts\All as AllContract;
use Numenor\ApiWrapper\Resource\Contracts\Create as CreateContract;
use Numenor\ApiWrapper\Resource\Contracts\Delete as DeleteContract;
use Numenor\ApiWrapper\Resource\Contracts\Get as GetContract;
use Numenor\ApiWrapper\Resource\Contracts\Update as UpdateContract;
use Numenor\ApiWrapper\Resource\Operations\All;
use Numenor\ApiWrapper\Resource\Operations\Create;
use Numenor\ApiWrapper\Resource\Operations\Delete;
use Numenor\ApiWrapper\Resource\Operations\Get;
use Numenor\ApiWrapper\Resource\Operations\Update;
use Numenor\ApiWrapper\Resource\ApiResource;

class BasicApiResource extends ApiResource implements AllContract, CreateContract, DeleteContract, GetContract, UpdateContract
{
    use All;
    use Create;
    use Delete;
    use Get;
    use Update;

    public $idField = 'id';

    public $attributes = [
        'id' => 1
    ];

    public $dirty = [];

    public $casts = [];

    public $didGetAttributes = [];

    public $didSetAttributes = [];

    public function getAttribute(string $key)
    {
        $this->didGetAttributes[] = $key;
        return parent::getAttribute($key);
    }

    public function setAttribute(string $key, $value): ApiResource
    {
        $this->didSetAttributes[] = $key;
        return parent::setAttribute($key, $value);
    }
}