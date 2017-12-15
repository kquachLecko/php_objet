<?php

declare(strict_types=1);

namespace Application\Router;

use Exception;

use function strpos;
use function substr;
use function ucfirst;

final class ParseUriSlashNotationHelper implements ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function parseUri(string $requestUri): string
    {
        if ($requestUri[0] === '/') {
            $requestUri = substr($requestUri, 1);
        }

        if (strpos($requestUri, '/') === false) {
            throw new Exception('L\'URL fournie ne reponds pas au pattern défini');
        }

        $requestedFile = substr(
            $requestUri,
            0,
            strpos($requestUri, '/')
        );

        $requestedFile = ucfirst($requestedFile);

        return "Application\Controller\\{$requestedFile}Controller";
    }
}
