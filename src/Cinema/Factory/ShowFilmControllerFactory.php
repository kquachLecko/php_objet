<?php

declare(strict_types=1);

namespace Cinema\Factory;

use Cinema\Controller\ShowFilmController;
use Cinema\Repository\FilmRepository;
use Psr\Container\ContainerInterface;

final class ShowFilmControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowFilmController
    {
        $filmRepository = $container->get(FilmRepository::class);

        return new ShowFilmController($filmRepository);
    }
}
