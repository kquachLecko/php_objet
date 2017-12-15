<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Router\ParseUriHelper;
use Application\Router\Router;
use DateTimeInterface;
use Psr\Container\ContainerInterface;

final class RouterFactory
{
    public function __invoke(ContainerInterface $container) : Router
    {
        return new Router(
            $container->get(ParseUriHelper::class),
            $container->get(DateTimeInterface::class)
        );
    }
}
