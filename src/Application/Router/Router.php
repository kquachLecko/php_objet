<?php

declare(strict_types=1);

namespace Application\Router;

use Application\Controller\ErrorController;
use Application\Controller\IndexController;
use Application\Exception\InvalidControllerException;
use DateTimeInterface;
use Exception;

use function class_exists;

final class Router
{
    private $controllerClass = IndexController::class;

    /**
     * @var ParseUriHelper
     */
    private $parseUriHelper;
    /**
     * @var \DateTimeImmutable
     */
    private $dateTimeImmutable;

    public function __construct(ParseUriHelper $parseUriHelper, DateTimeInterface $dateTimeImmutable)
    {
        $this->parseUriHelper = $parseUriHelper;
        $this->dateTimeImmutable = $dateTimeImmutable;
    }

    /**
     * Resolve a request to a controller name
     *
     * @param string $requestUri
     * @return string Nom de la classe controller
     * @throws Exception
     */
    public function resolve(string $requestUri) : string
    {
        try {
            $this->controllerClass = $this->parseUriHelper->parseUri($requestUri);
        } catch (Exception $exception) {
        }

        try {
            $this->validateController($this->controllerClass);
        } catch (InvalidControllerException $exception) {
            return (new ErrorController($exception))->error404Action();
        } catch (Exception $exception) {
            return (new ErrorController($exception))->error500Action();
        }

        return $this->controllerClass;
    }

    /**
     * @param string $controllerClass
     * @throws Exception
     */
    private function validateController(string $controllerClass) : void
    {
        if (!class_exists($controllerClass)) {
            throw new InvalidControllerException('Invalid controller specified');
        }
    }
}
