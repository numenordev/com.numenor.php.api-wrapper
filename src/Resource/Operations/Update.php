<?php

namespace Numenor\ApiWrapper\Resource\Operations;

use GuzzleHttp\Client as GuzzleClient;
use Numenor\ApiWrapper\Api\Request;
use Numenor\ApiWrapper\Resource\ApiResource;
use Symfony\Component\String\Inflector\EnglishInflector;
use function Symfony\Component\String\u;

/**
* @mixin \Numenor\ApiWrapper\Resource\ApiResource
 */
trait Update
{
    /**
     * Get the name for the "Update" Route for this Resource.
     * @return string
     */
    public function updateRoute(): string
    {
        $class = explode('\\', static::class);
        $resource = (new EnglishInflector())->pluralize(array_pop($class))[0];

        return $this->updateRoute ??
            u($resource)->camel() . '.update';
    }

    /**
     * @param int|string $id
     * @param array $attributes
     * @param array $options
     * @param GuzzleClient|null $client
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Numenor\ApiWrapper\Api\Exceptions\EndpointNotDefinedException
     */
    public static function update($id, array $attributes, array $options = [],
                                  GuzzleClient $client = null): ApiResource
    {
        $instance = static::cast([]);
        $instance->setAttribute($instance->getIdField(), $id);
        return $instance->updateAttributes($attributes, $options, $client);
    }

    /**
     * Call the "Update" Route for this ApiResource using an array of attributes.
     * @param array $attributes
     * @param array $options
     * @param GuzzleClient|null $client
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Numenor\ApiWrapper\Api\Exceptions\EndpointNotDefinedException
     */
    public function updateAttributes(array $attributes, array $options = [], GuzzleClient $client = null): ApiResource
    {
        $response = Request::route($this->updateRoute(), $client)
            ->pathParams([$this->getIdField() => $this->getId()])
            ->json($attributes)
            ->options($options)
            ->send();

        return $this->mergeAttributes($response->json() ?? []);
    }

    /**
     * Call the "Update" Route for this ApiResource using the instance attributes.
     * @param array $options
     * @param GuzzleClient|null $client
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Numenor\ApiWrapper\Api\Exceptions\EndpointNotDefinedException
     */
    public function saveChanges(array $options = [], GuzzleClient $client = null): ApiResource
    {
        return $this->updateAttributes($this->getDirty(), $options, $client);
    }
}