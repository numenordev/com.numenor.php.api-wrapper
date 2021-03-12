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

/**
 * Class JsonPlaceholderPost
 * @property string id
 * @property string userId
 * @property string title
 * @property bool completed
 */
class JsonPlaceholderPost extends ApiResource implements AllContract, CreateContract, DeleteContract, GetContract, UpdateContract
{
    use All;
    use Create;
    use Delete;
    use Get;
    use Update;

    protected $allRoute = 'posts.all';
    protected $createRoute = 'posts.create';
    protected $deleteRoute = 'posts.delete';
    protected $getRoute = 'posts.get';
    protected $updateRoute = 'posts.update';
}