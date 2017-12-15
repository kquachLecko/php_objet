<?php

declare(strict_types=1);

namespace Cinema\Factory;

use Cinema\Controller\FilmController;
use Cinema\Repository\FilmRepository;
use Psr\Container\ContainerInterface;

final class FilmControllerFactory
{
    public function __invoke(ContainerInterface $container) : FilmController
    {
        $filmRepository = $container->get(FilmRepository::class);

        return new FilmController($filmRepository);
    }
}
