<?php

declare(strict_types=1);

namespace Application\Router;

use Exception;

use function strpos;
use function substr;
use function ucfirst;

final class ParseUriDotNotationHelper implements ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function parseUri(string $requestUri): string
    {
        if (strpos($requestUri, '.') === false) {
            throw new Exception('L\'URL fournie ne reponds pas au pattern défini');
        }

        $requestedFile = substr(
            $requestUri,
            0,
            strpos($requestUri, '.')
        );

        if ($requestedFile[0] === '/') {
            $requestedFile = substr($requestedFile, 1);
        }

        $requestedFile = ucfirst($requestedFile);

        return "Application\Controller\\{$requestedFile}Controller";
    }
}
