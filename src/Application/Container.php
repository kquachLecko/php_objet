<?php

declare(strict_types=1);

namespace Application;

use Exception;

final class Container
{
    /**
     * @var array
     */
    private $config;

    public function __construct(array $config)
    {
        /**
         * tester :
         *  - les clés sont des string
         *  - les valeurs sont des objets
         */
        $this->config = $config;
    }

    public function has(string $key) : bool
    {
        return isset($this->config[$key]);
    }

    /**
     * @param string $key
     * @return object
     * @throws Exception
     */
    public function get(string $key) : object
    {
        if (!$this->has($key)) {
            throw new Exception("Service {$key} not found");
        }

        return $this->config[$key];
    }
}
