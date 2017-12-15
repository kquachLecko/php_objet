<?php

declare(strict_types=1);

namespace Application\Router;

use Exception;

interface ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function parseUri(string $requestUri) : string;
}
